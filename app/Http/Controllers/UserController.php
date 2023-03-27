<?php

namespace App\Http\Controllers;

use App\Repositories\Profile\ProfileRepository;
use App\Repositories\User\UserRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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

    public function showUpdateUser() {
        try{
            $user = Auth::user();

            $profilesList = $this->profileRepository->getAll();

            if (count($profilesList) == 0)
                throw new ModelNotFoundException("No profiles available, please contact support", 404);

            return view('updateUser', compact("user", "profilesList"));
        }
        catch(Exception $exception){
            return view('error', ['error' => $exception]);
        }
        
    }

    public function updateUser(Request $request) {
        $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'required|max:255',
            'birthday' => 'required|before_or_equal:' .  Date('Y-m-d'),
            'profile' => 'required|exists:profiles,id'
        ]);
        
        $userUpdated = $this->userRepository->update(
            $request->id,
            $request->name,
            $request->password,
            $request->profile,
            $request->birthday,
        );

        if ($userUpdated == true)
            return redirect(route("showHome"));
    }

    public function deleteUser(Request $request) {
        
        $request->validate([
            'id' => 'required|exists:users,id'
        ]);
        
        $userDeleted = $this->userRepository->delete(
            $request->id,
        );

        return redirect(route("showHome"));
    }
}
