<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\LoginRequest;

use Auth;
use App\User;

class AdminController extends Controller
{
    public function login(LoginRequest $request){
        
        if(Auth::check()){
            if(Auth::user()->role == 1)
            {
                return redirect('dealers');
            }else if(Auth::user()->role == 2)
            {
                return redirect('/dealerDashboard');
            }else{
                return redirect('/');
            }
            
        }

        if($request->isMethod('post')){
            $validated = $request->validated();
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1, 'role' =>1]))
            {
				return redirect('dealers');
            }else if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1, 'role' =>2])) 
            {
				return redirect('/dealerDashboard');
			}else{
                return redirect()->back()->withErrors('Email or Password does not match.');
			}
        }else{
            return view('login');
        }
    }

    public function dashboard(Request $request){
        if(Auth::check()){
            if(Auth::User()->role == 1){
                return view('dashboard'); 
            }else{
                return redirect('/');
            }
        }else{
            return redirect('/');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->flush();
        return redirect('/');
    }
}
