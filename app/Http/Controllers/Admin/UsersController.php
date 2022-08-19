<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Institute;
use App\Models\Management;
use App\Models\Region;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with(['roles'])->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');
        $data = [];
        $data['regions'] = Region::all();
        return view('admin.users.create', compact('roles','data'));
    }

    public function store(StoreUserRequest $request)
    {

        $active_region = 0;
        $active_management = 0;
        if($request->another_roles == 'management'){
            $active_management = 1;
        }else{
            $active_region = 1;
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
            'region_code' => $request->region,
            'management_code' => $request->management,
            'institute_code' => $request->institute,
            'active_region' => $active_region,
            'active_management' => $active_management,
        ]);

        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $user->load('roles');
        $data = [];
        $data['regions'] = Region::all();
        $region_code  = $user->region_code;
        $management_code  = $user->management_code;
        $data['managements'] =  Management::where('region_code', $region_code)->get();
        $data['institutes'] = Institute::where('management_code', $management_code)->get();
        return view('admin.users.edit', compact('roles', 'user','data'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $active_region = 0;
        $active_management = 0;
        if($request->another_roles == 'management'){
            $active_management = 1;
        }else{
            $active_region = 1;
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
            'region_code' => $request->region,
            'management_code' => $request->management,
            'institute_code' => $request->institute,
            'active_region' => $active_region,
            'active_management' => $active_management,
        ]);
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
