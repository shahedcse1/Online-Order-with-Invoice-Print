<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Role;
use App\Models\RoleModule;

class RoleController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }

    public function index($locale)
    {

        return view('admin.role.view');

    }

    public function create($locale)
    {

        $roleModules = RoleModule::orderBy('title', 'asc')->get();

        return view('admin.role.create', compact('roleModules'));
    }

    public function store($locale, Request $request)
    {

        $array   = array();
        $array[] = array("model" => "module",           "permission" => json_decode($request->input('module'))[0]);
        $array[] = array("model" => "role",             "permission" => json_decode($request->input('role'))[0]);
        $array[] = array("model" => "user",             "permission" => json_decode($request->input('user'))[0]);
        $array[] = array("model" => "order",            "permission" => json_decode($request->input('order'))[0]);
        $array[] = array("model" => "excel_file",       "permission" => json_decode($request->input('excel_file'))[0]);
        $array[] = array("model" => "search_order",     "permission" => json_decode($request->input('search_order'))[0]);

        if ($request->input('title')) {

            $request->validate([
                'title'                     => ['required', 'string', 'unique:roles'],
            ]);

            $role = new Role();
            $role->title = $request->input('title');
            $role->permissions = json_encode($array);
            $role->save();

        }

        return redirect('/en/admin/role/');
    }

    public function edit($locale, Role $role = null)
    {

        $roleModules = RoleModule::orderBy('title', 'asc')->get();

        return view('admin.role.edit', compact('role', 'roleModules'));

    }

    public function update($locale, Request $request, Role $role = null)
    {

        $array   = array();

        $array[] = array("model" => "module",                   "permission" => json_decode($request->input('module'))  ? json_decode($request->input('module'))[0] : 0);

        $array[] = array("model" => "role",                     "permission" => json_decode($request->input('role'))  ? json_decode($request->input('role'))[0] : 0);

        $array[] = array("model" => "user",                     "permission" => json_decode($request->input('user'))  ? json_decode($request->input('user'))[0] : 0);

        $array[] = array("model" => "order",                    "permission" => json_decode($request->input('order'))  ? json_decode($request->input('order'))[0] : 0);

        $array[] = array("model" => "excel_file",               "permission" => json_decode($request->input('excel_file'))  ? json_decode($request->input('excel_file'))[0] : 0);

        $array[] = array("model" => "search_order",             "permission" => json_decode($request->input('search_order'))  ? json_decode($request->input('search_order'))[0] : 0);

        if ($request->input('title')) {

            $request->validate([
                'title'      => ['required', 'string', Rule::unique('roles', 'title')->ignore($role->id)],
            ]);

            $role->title = $request->input('title');
            $role->permissions = json_encode($array);
            $role->save();
        }

        return redirect('/en/admin/role/');
    }

    public function delete($locale, Role $role = null)
    {

        $role->delete();

        return redirect()->route('all.role', $locale)->with('alert-danger', 'Role delete successfully');

    }

    public function deleteData($locale, Role $role)
    {

        return $role;

    }
}
