<?php

namespace App\Http\Controllers;

use App\Repositories\Profile\ProfileRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProfilesController extends Controller
{
    private $profileRepository;

    public function __construct(
        ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function showProfiles() {
        try{
            $profilesList = $this->profileRepository->getAll();

            return view('profiles', compact("profilesList"));
        }
        catch(Exception $exception){
            return view('error', ['error' => $exception]);
        }
        
    }

    public function showCreateProfile() {
        try{
            return view('createProfile');
        }
        catch(Exception $exception){
            return view('error', ['error' => $exception]);
        }   
    }

    public function createProfile(Request $request) {
        $request->validate([
            'name' => 'required|max:255'
        ]);
        
        $profileCreated = $this->profileRepository->save(
            $request->name,
        );

        if ($profileCreated != null)
            return redirect(route("showProfiles"));
    }

    public function showUpdateProfile($profile_id) {
        try{
            $profile = $this->profileRepository->getById($profile_id);
    
            return view('updateProfile', compact("profile"));
        }
        catch(Exception $exception){
            return view('error', ['error' => $exception]);
        }   
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'id' => 'required|exists:profiles,id',
            'name' => 'required|max:255'
        ]);
        
        $profileUpdated = $this->profileRepository->update(
            $request->id,
            $request->name,
        );

        if ($profileUpdated == true)
            return redirect(route("showProfiles"));
    }


    

    public function deleteProfile(Request $request) {
        
        $request->validate([
            'id' => 'required|exists:profiles,id'
        ]);
        
        $profileDeleted = $this->profileRepository->delete(
            $request->id,
        );

        return redirect(route("showProfiles"));
    }
}
