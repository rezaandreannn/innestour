<?php

namespace App\Http\Controllers\Frondend;

use App\Models\Mou;
use App\Models\User;
use App\Models\Paket;
use App\Models\DetailPaket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $admin = User::with('role')->where('role_id', 1)->first();
        $mous = Mou::orderBy('updated_at', 'desc')->get();

        if (Auth::check()) {
            $mous_user_id = $mous->where('user_id', Auth::user()->id)->first();
        } else {
            $mous_user_id = '';
        }

        $pakets = Paket::all();
        // $pakets = DB::table('detail_pakets')
        //     ->join('pakets', 'pakets.id', '=', 'detail_pakets.paket_id')
        //     ->join('wisatas', 'wisatas.id', '=', 'detail_pakets.wisata_id')
        //     ->select('wisatas.*', 'pakets.*')
        //     ->get()
        //     ->groupBy('paket_id');
        // dd($pakets);

        // dd($admin);
        return view('frondend.index', compact('admin', 'mous', 'mous_user_id', 'pakets'));
    }
}
