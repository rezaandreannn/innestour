<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


    public function index(Request $request)
    {
        if (Auth::user()->role_id != 1) {
            return redirect()->route('home.index');
        }

        $bulan = $request->input('bulan');

        if ($bulan) {
            $month = $bulan;
        } else {
            $month = date('m');
        }

        $pending = Invoice::where('status', 'pending')
            ->where('bukti', '=', null)
            ->whereMonth('created_at', $month)
            ->count();
        $shipping = Invoice::where('status', 'pending')
            ->where('bukti', '!=', 'null')
            ->whereMonth('created_at', $month)
            ->get();
        $lunas = Invoice::where('status', 'lunas')
            ->whereMonth('created_at', $month)
            ->get();
        $invoiceAll = Invoice::whereMonth('created_at', $month)->get();

        $pen_pending = $shipping->sum('total_tagihan');
        $pen_acc = $lunas->sum('total_tagihan');

        return view('dashboard', compact('pending', 'shipping', 'lunas', 'invoiceAll', 'pen_pending', 'pen_acc'));
    }
}
