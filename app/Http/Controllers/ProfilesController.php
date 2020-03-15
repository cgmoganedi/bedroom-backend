<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        return view('profiles.index', [
            'user' => $user
        ]);
    }

    public function edit(User $user){
        $this->authorize('update', $user->profile);

        return view('profiles.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user){
        $this->authorize('update', $user->profile);

        $profile = request()->validate([
            'title' => 'required|string|max:60',
            'profile_description' => 'required|string|max:200',
            'website_url' => 'url',
            'image' => 'image'
        ]);

        if(request('image')){
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $profile = array_merge(
                $profile,
                ['image' => $imagePath]
            );
        }
        auth()->user()->profile->update($profile);

        return redirect("/profile/{$user->id}");
    }

}
