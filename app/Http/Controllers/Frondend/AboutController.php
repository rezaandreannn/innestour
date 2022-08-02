<?php

namespace App\Http\Controllers\Frondend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $admin = User::with('role')->where('role_id', 1)->first();
        return view('frondend.about', compact('admin'));
    }
}
