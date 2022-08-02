<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $breadcrumbs = [
            // 'Dashboard' => route('dashboard.index'),
            'Profile' => route('profile.show')
        ];

        return view('auth.profile', compact('breadcrumbs'));
    }

    public function ubahPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPassword = Auth::user()->password;
        $oldPassword = request('old_password');
        $newPassword = request('password');

        if (Hash::check($oldPassword, $currentPassword)) {
            if ($oldPassword == $newPassword) {
                return back()->withErrors(['password' => '
                password baru tidak boleh sama dengan password lama']);
            }
            Auth::user()->update([
                'password' => bcrypt(request('password'))
            ]);
            return back()->with('message', 'Ubah Password Berhasil');
        } else {
            return back()->withErrors(['old_password' => '
            password lama salah']);
        }
    }

    public function edit()
    {
        $breadcrumbs = [
            'Dashboard' => route('dashboard'),
            'Edit Profile' => route('profile.edit')
        ];

        return view('auth.edit-profile', compact('breadcrumbs'));
    }

    public function update(Request $request)
    {

        $data = $request->validate([
            'no_hp' => 'required|regex:/^(08[0-9\s\-\+\(\)]*)$/|min:10|unique:users',
            'jenis_kelamin' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $data['image'] = $request->file('image')->store('profile');
        }

        Auth::user()->update($data);

        return redirect()->route('profile.show')->with('message', 'anda telah memperbarui profile');
    }
}
