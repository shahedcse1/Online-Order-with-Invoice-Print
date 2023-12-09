<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class ProfileController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function edit(){

        $user = User::find(auth()->user()->id);

        return view('admin.profile.edit', compact('user'));
    }

    public function update(Request $request){

        $user = User::find(auth()->user()->id);

        $user->name      = $request->input('name');
        $user->email     = $request->input('email');
        $user->save();

        session()->flash('profileUpdated', 'Your profile has been updated successfully');

        return redirect('/en/admin/profile/edit');
    }

    public function editPassword(){

        $user = User::find(auth()->user()->id);

        return view('admin.profile.passwordUpdate', compact('user'));
    }

    public function updatePassword(){

        $this->validate(request(), [

            'password' => 'required|string|min:6|confirmed'

        ]);

        $profileToEdit = User::find(auth()->user()->id);

        if (Hash::check(request()->input('current_password'), $profileToEdit->password)) {

            $profileToEdit->password = bcrypt(request()->input('password'));

            $profileToEdit->save();

            session()->flash('updatedSuccessfully', 'Your password has been changed.');

            return redirect(url('/en/admin/profile/password'));


        } else {

            session()->flash('currentPasswordError', 'In Correct Password');

            return redirect(url('/en/admin/profile/password'));

        }
    }

    public function userInactive(){

        $user = User::find(auth()->user()->id);

        return view('admin.profile.inactive', compact('user'));
    }
}
