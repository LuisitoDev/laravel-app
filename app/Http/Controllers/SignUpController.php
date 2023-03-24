<?php

namespace App\Http\Controllers;

use App\Exceptions\ProfilesNotFoundException;
use App\Repositories\Profile\ProfileRepository;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    private $userRepository;
    private $profileRepository;

    public function __construct(
        UserRepository $userRepository,
        ProfileRepository $profileRepository)
    {
        $this->userRepository = $userRepository;
        $this->profileRepository = $profileRepository;
    }

    public function showSignUp() {
        try{
            $profilesList = $this->profileRepository->getAll();

            if (count($profilesList) == 0)
                throw new ModelNotFoundException("No profiles available, please contact support", 404);

            return view('sign-up', compact("profilesList"));
        }
        catch(ModelNotFoundException $exception){
            return view('error', ['error' => $exception]);
        }
    }

    public function signUp(Request $request) {
        try{
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|unique:users|email:rfc,dns|max:255',
                'password' => 'required|max:255',
                'birthday' => 'required|before_or_equal:' .  Date('Y-m-d'),
                'profile' => 'required|exists:profiles,id',
            ]);

            $userCreated = $this->userRepository->save(
                $request->name,
                $request->email,
                Hash::make($request->password),
                $request->profile,
                $request->birthday,
            );

            if ($userCreated != null)
                return redirect(route("showLogin"));
        }
        catch(Exception $exception){
            return view('error', ['error' => $exception]);
        }
    }
}