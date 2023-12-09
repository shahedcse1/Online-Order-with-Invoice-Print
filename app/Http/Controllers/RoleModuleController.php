<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\RoleModule;

class RoleModuleController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }
    

    public function index($locale){

        $all_role_modules = RoleModule::orderBy('title','ASC')->get();

        return view('admin.rolemodule.index',compact('all_role_modules'));

    }

    public function store($locale,Request $request){

        $request->validate([
            'title'                     => ['required', 'string', 'unique:role_modules'],
        ]);

        $role_module = new RoleModule();
        $role_module->title                = $request->title;
        
        $role_module->save();
        
        return back()->with('alert-success','Role Module Insert successful');
    }

    public function edit($locale, RoleModule $roleModule){

        return view('admin.rolemodule.edit',compact('roleModule'));

    }

    public function update($locale, Request $request, RoleModule $roleModule){

        $request->validate([
            'title'                     => ['required', 'string', Rule::unique('role_modules','title')->ignore($roleModule->id)],
        ]);

        $roleModule->title                = $request->title;

        $roleModule->save();
        return redirect()->route('all.role_module',$locale)->with('alert-success','Role Module Updated successfully');

    }

    public function delete($locale, RoleModule $roleModule){

        $roleModule->delete();

        return redirect()->route('all.role_module', $locale)->with('alert-danger', 'Role Module delete successfully');

    }
}
