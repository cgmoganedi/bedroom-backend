<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($userid)
    {
        $user = User::findOrFail($userid);

        return view('profiles.index', [
            'user' => $user
        ]);
    }
}
