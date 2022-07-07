<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nav = "User";
        $data = User::orderBy('id', 'DESC')->paginate(30);

        return view('users.index', compact('data', 'nav'))
            ->with('i', ($request->input('page', 1) - 1) * 30);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nav = "User";
        $roles = Role::pluck('name', 'name')->all();
        $instansi = Instansi::pluck('nama', 'id')->all();
        return view('users.create', compact('roles', 'nav', 'instansi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'instansi_id' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nav = "User";
        $user = User::find($id);
        return view('users.show', compact('user', 'nav'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nav = "User";
        $user = User::find($id);
        $instansi_id = User::where('id', $id)->pluck('instansi_id');
        $roles = Role::pluck('name', 'name')->all();
        $instansi = Instansi::pluck('nama', 'id')->all();

        $userInstansi = Instansi::where('id', $instansi_id)->pluck('nama', 'id')->all();

        //$userInstansi = $user->instansis->pluck('nama','id')->all();

        $userRole = $user->roles->pluck('name', 'name')->all();
        // /dd($userInstansi);

        return view('users.edit', compact('user', 'roles', 'userRole', 'nav', 'instansi', 'userInstansi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'instansi_id' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
