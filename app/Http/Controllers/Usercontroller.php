<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            'Dashboard' => route('dashboard'),
            'User' => route('user.index')
        ];

        $theads = ['No', 'Nama', 'Email', 'Role', 'Dibuat', 'Aksi'];

        $users = User::with('role')->get();

        return view('user.index', compact('breadcrumbs', 'theads', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            'Dashboard' => route('dashboard'),
            'User' => route('user.create')
        ];


        $roles = Role::all();

        return view('user.create', compact('breadcrumbs', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        User::create($data);

        return redirect()->route('user.index')->with('message', 'berhasil menambahkan data user.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $breadcrumbs = [
            'Dashboard' => route('dashboard'),
            'User' => route('user.index'),
            'Detail' => route('user.show', $user->id)
        ];
        return view('user.detail', compact('user', 'breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $breadcrumbs = [
            'Dashboard' => route('dashboard'),
            'User' => route('user.index'),
            'Edit' => route('user.edit', $user->id)
        ];

        $roles = Role::all();
        return view('user.edit', compact('user', 'roles', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role_id' => ['required'],
            'no_hp' => ''
        ]);

        User::where('id', $user->id)
            ->update($data);

        return redirect()->route('user.index')->with('message', 'berhasil mengubah data user.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::where('id', $user->id)
            ->delete();

        return redirect()->route('user.index')->with('message', 'berhasil menghapus data user.');
    }
}
