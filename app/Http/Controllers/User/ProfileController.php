<?php

namespace App\Http\Controllers\User;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function edit(Profile $profile)
    {
        return view()->make('user.profile.edit');
    }

    public function update(Request $request, Profile $profile)
    {
        // This Will Update the Profile
    }

}
