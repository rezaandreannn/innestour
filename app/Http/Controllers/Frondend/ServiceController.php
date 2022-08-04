<?php

namespace App\Http\Controllers\Frondend;

use App\Models\Mou;
use App\Models\Paket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $mous = Mou::orderBy('updated_at', 'desc')->get();

        if (Auth::check()) {
            $mous_user_id = $mous->where('user_id', Auth::user()->id)
                ->where('status', 'acc')
                ->first();
        } else {
            $mous_user_id = '';
        }

        // dd($mous_user_id);

        $pakets = Paket::all();

        return view('frondend.service',  compact('mous', 'mous_user_id', 'pakets'));
    }
}
