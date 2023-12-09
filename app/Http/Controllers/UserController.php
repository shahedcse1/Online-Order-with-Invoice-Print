<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use App\Models\User;

class UserController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }

    public function view($locale)
    {

        $userDatas = User::orderBy('name', 'ASC')->get();

        return view('admin.user.view', compact('userDatas'));

    }


    public function create($locale)
    {

        return view('admin.user.create');

    }

    public function store($locale, Request $request)
    {

        $request->validate([

            'phone'                     => ['required', 'string', 'unique:users'],

            'email'                     => ['required', 'string'],

            'name'                      => ['required', 'string'],

            'password'                  => ['required', 'string'],

            'role'                      => ['required', 'string'],

            'status'                    => ['required', 'string']
        ]);

        $newUser            = new User();
        $newUser->phone     = $request->input('phone');
        $newUser->name      = $request->input('name');
        $newUser->email     = $request->input('email');
        $newUser->password  = bcrypt($request->input('password'));
        $newUser->role_id   = $request->input('role');
        $newUser->status    = $request->input('status');
        $newUser->remarks   = $request->input('remarks');
        $newUser->save();

        return redirect('/en/admin/user/');
    }

    public function edit($local, User $user)
    {

        return view('admin.user.edit', compact('user'));

    }

    public function update($local, User $user, Request $request)
    {

        $request->validate([

            'phone'                     => ['required', 'string', Rule::unique('users', 'phone')->ignore($user->id)],

            'email'                     => ['required', 'string'],

            'name'                      => ['required', 'string'],

            'role'                      => ['required','string'],


            'status'                    => ['required','string']
        ]);


        $newUser            = User::find($user->id);
        $newUser->name      = $request->input('name');
        $newUser->phone     = $request->input('phone');
        $newUser->email     = $request->input('email');

        if ($request->input('password') != null) {

            $newUser->password  = bcrypt($request->input('password'));

        }

        $newUser->role_id   = $request->input('role');
        $newUser->status    = $request->input('status');
        $newUser->remarks   = $request->input('remarks');
        $newUser->save();


        return redirect('/en/admin/user/');
    }

}
