<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHome() {
        try{
            return view('home');
        }
        catch(Exception $exception){
            return view('error', ['error' => $exception]);
        }
        
    }
}
