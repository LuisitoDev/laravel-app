<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function showLogin() {
        try{
            return view('login');
        }
        catch(Exception $exception){
            return view('error', ['error' => $exception]);
        }
    }

    public function logOut(Request $request) {
        try{
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect(route('showLogin'));
        }
        catch(Exception $exception){
            return view('error', ['error' => $exception]);
        }
        
    }

    public function login(Request $request) {
        try{
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)){
                $request->session()->regenerate();

                return redirect()->intended(route("showHome"));
            }


            return Redirect::back()->withErrors(
                [
                    'loginFail' => 'The email or the password may be incorrect'
                ]
            );
        }
        catch(Exception $exception){
            return view('error', ['error' => $exception]);
        }
    
    }

}
