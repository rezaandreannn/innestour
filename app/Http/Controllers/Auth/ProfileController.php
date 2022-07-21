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
        return view('auth.profile');
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

        return view('auth.edit-profile');
    }

    public function update(Request $request)
    {

        $data = $request->validate([
            'no_hp' => 'required|numeric',
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
