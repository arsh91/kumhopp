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

class SubDealerFrontController extends Controller
{
	
    /*Dealer Dashboard for front end user*/
    public function subDealerDashboard(Request $request){
        $dealerContents = DealerContent::where('status','1')->get();        
        return view('front.subdealer.welcome', compact('dealerContents'));
    }

}
?>