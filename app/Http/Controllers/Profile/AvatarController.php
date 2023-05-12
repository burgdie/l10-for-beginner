<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

class AvatarController extends Controller
{
    public function update()
    {
        //Store Avatar
        // return response()->redirectTo('/profile');
        //return back()->with('message', 'Avatar is changed.');
        return redirect(route('profile.edit'));
    }
}
