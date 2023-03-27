<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(
        UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function showEditUser() {
        try{
            $usersList = $this->userRepository->getAll();

            return view('home', compact("usersList"));
        }
        catch(Exception $exception){
            return view('error', ['error' => $exception]);
        }
        
    }
}
