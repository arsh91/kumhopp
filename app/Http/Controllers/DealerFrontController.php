<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Dealer;
use App\Job;
use App\DealerContent;
use App\PasswordReset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\sendEmailNotification;
use App\Http\Requests\StoreDealerRequest;
use App\Http\Requests\UpdateDealerRequest;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use Illuminate\Support\Facades\Input;

class DealerFrontController extends Controller
{
	
    /*Dealer Dashboard for front end user*/
    public function dealerDashboard(Request $request){
        $dealerContents = DealerContent::where('status','1')->get();        
        return view('front.dealer.welcome', compact('dealerContents'));
    }

    /*static pages link on dealer page*/
    public function suppliers(){
    	return view('pages.suppliers');	
    }

    public function marketing(){
    	return view('pages.marketing');	
    }

    public function downloads(){
    	return view('pages.downloads');	
    }

    public function news(){
    	//return view('front.dealer.comingsoon');	
        return view('front.dealer.news'); 
    }
	
	public function news2(){
    	//return view('front.dealer.comingsoon');	
        return view('front.dealer.news2'); 
    }
	
	public function news3(){
    	//return view('front.dealer.comingsoon');	
        return view('front.dealer.news3'); 
    }

	/*Get the jobs created by admin with this dealer_id
	* first get dealer_id from dealer table using user_id and then use it to fetch the jobs
	*/
    public function dealerJobs(){
        $userId = Auth::id();
		$dealer_id = Dealer::where('dealer_id',$userId)->get()->first();  
        $dealer_id = $dealer_id->id;
		$dealerJobs = Job::where('dealer_id',$dealer_id)->get();  
        //dd($dealerJobs);      
        return view('front.dealerJobs.index', compact('dealerJobs'));   
    }

    public function getJobDetail($id){
        $userId = Auth::id();
		$dealer_id = Dealer::where('dealer_id',$userId)->get()->first();   //get dealer table's primary key by auth id
        $dealer_id = $dealer_id->id;
        $dealerJob = Job::where('id',$id)->where('dealer_id',$dealer_id)->get(); //pass dealer's P.K to jobs table

        //dd($dealerJob);
        return view('front.dealerJobs.show', compact('dealerJob'));      
    }

    /*Forgot Password function
    * @Params email
    * @Returns 
    */
    public function sendForgotPasswordEmail(Request $request){
        
        $request->validate([
            'email' => 'required|string|email',
        ]);
        
        $emailID = $request->email;
        
        $user = User::where('email', $emailID)->first();
        
        if (!$user)
            return back()->withErrors(['No account registered with provided email.'])->withInput(Input::except('password'));
        
        
        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'user_id' => $user->id,
                'token' => str_random(60)
             ]
        );
        
        if ($user && $passwordReset)
            $user->notify(
                new PasswordResetRequest($passwordReset->token)
            );
            
        return redirect()->route('login')->with('success','Password Reset Email Sent and is Valid for next 30 minutes !!');
        
    }

    /*Check that password Reset link is valid or not*/
    public function checkResetLinkValidity($token){
        
        $passwordReset = PasswordReset::where('token', $token)->first();
        
        if (!$passwordReset)
            return view('password-error')->withErrors(['INVALID Password Reset Link.']);
        
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(30)->isPast()) {
            $passwordReset->delete();
            return view('password-error')->withErrors(['Password Reset Link Expired, Kindly RESET your password again !!']);
        }
        
        return view('reset-password',array('token'=>$token));
        
    }

    /*Password reset*/
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|confirmed',
            'token' => 'required|string'
        ]);
        
        $passwordReset = PasswordReset::where([['token', $request->token]])->first();
        
        if (!$passwordReset)
            return view('password-error')->withErrors(['INVALID Password Reset Link.']);
        
        $user = User::where('email', $passwordReset->email)->first();
        $user->password = $request->password;
        
        if($user->save()){
            
            $passwordReset->delete();
            $user->notify(new PasswordResetSuccess($passwordReset));
            return redirect()->route('login')->with('success','Password updated successfully !!');
        }else{
            return view('password-error')->withErrors(['Network Error, Please Re-try again !!']);
        }

    }

}
?>