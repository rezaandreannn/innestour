<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            'Dashboard' => route('dashboard.index'),
            'Role' => route('role.index')
        ];

        $theads = ['No', 'Nama', 'Deskripsi', 'Dibuat', 'Aksi'];

        $roles = Role::all();

        return view('role.index', compact('breadcrumbs', 'theads', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            'Dashboard' => route('dashboard.index'),
            'Buat Role' => route('role.create')
        ];

        return view('role.create', compact('breadcrumbs'));
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
            'name' => 'required',
            'deskripsi' => 'required'
        ]);

        Role::create($data);

        return redirect()->route('role.index')->with('message', 'berhasil menambahkan data role.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $breadcrumbs = [
            'Dashboard' => route('dashboard.index'),
            'Edit Role' => route('role.edit', $role->id)
        ];
        return view('role.edit', compact('role', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => 'required',
            'deskripsi' => 'required'
        ]);

        Role::where('id', $role->id)
            ->update($data);

        return redirect()->route('role.index')->with('message', 'berhasil mengubah data role.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Role::where('id', $role->id)
            ->delete();

        return redirect()->route('role.index')->with('message', 'berhasil menghapus data role.');
    }
}
