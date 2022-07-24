<?php

namespace App\Http\Controllers\Frondend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $admin = User::with('role')->where('role_id', 1)->first();

        // dd($admin);
        return view('frondend.index', compact('admin'));
    }
}
