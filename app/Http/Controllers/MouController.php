<?php

namespace App\Http\Controllers;

use App\Models\Mou;
use App\Models\User;
use App\Models\Balasan;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MouController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // cek role
        if (Auth::user()->role_id == 1) {
            $mous = Mou::with('user')->get();

            $theads = ['No', 'Nama User', 'Logo', 'Nama Perusahaan', 'Dokumen', 'Di buat', 'Status', 'Aksi'];
            $breadcrumbs = [
                'Dashboard' => route('dashboard.index'),
                'MOU' => route('mou.index')
            ];
            return view('mou.index', compact('breadcrumbs', 'theads', 'mous'));
        } else {
            $mous = Mou::with('user')->where('user_id', Auth::user()->id)->get();

            $theads = ['No', 'Nama User', 'Logo', 'Nama Perusahaan', 'Dokumen', 'Di buat', 'Status', 'Aksi'];

            $balasan = DB::table('balasans')
                ->join('mous', 'mous.id', '=', 'balasans.mou_id')
                ->join('users', 'users.id', '=', 'balasans.user_id')
                ->where('mous.user_id', '=', Auth::user()->id)
                ->first();


            // if (!$balasan) {
            //     return redirect()->route('mou.index')->with('message', 'tunggu😓. Kami sedang melakukan pengecakan data anda');
            // }

            return view('frondend.mou.index', compact('theads', 'mous', 'balasan'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $breadcrumbs = [
        //     'Dashboard' => route('dashboard'),
        //     'MOU' => route('mou.index'),
        //     'Tambah' => route('mou.create')
        // ];

        if (!Auth::check()) {
            return redirect('login');
        }

        return view('mou.create');
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
            'user_id' => '',
            'logo' => 'image|file|max:1024',
            'nama_perusahaan' => 'required',
            'email_perusahaan' => ['required', 'string', 'email', 'max:255', 'unique:mous'],
            'no_hp_perusahaan' => 'required|numeric',
            'dokumen' => 'required|mimes:pdf|max:1024'
        ]);

        if ($request->file('logo')) {
            $data['logo'] = $request->file('logo')->store('mou/logo');
        }

        $data['user_id'] = Auth::user()->id;
        $data['dokumen'] = $request->file('dokumen')->store('mou/dokumen');

        $mou = Mou::with('user')->get();

        foreach ($mou as $value) {
            if ($value->user_id == Auth::user()->id) {
                return redirect()->route('mou.create')->with('message', 'Anda sudah melakukan kerjasama bersama kami. Terimakasih 👍');
            }
        }
        Mou::create($data);


        return redirect()->route('mou.index')->with('message', 'Anda telah melakukan pengajuan kerjasama dengan kami, tunggu beberapa saat untuk data dicek oleh admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function show(Mou $mou)
    {

        $breadcrumbs = [
            'Dashboard' => route('dashboard.index'),
            'MOU' => route('mou.index'),
            'Detail' => route('mou.show', $mou->id)
        ];

        return view('mou.balasan-form', compact('breadcrumbs', 'mou'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function edit(Mou $mou)
    {
        return view('frondend.mou.edit', compact('mou'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mou $mou)
    {
        $data = $request->validate([
            'user_id' => '',
            'logo' => 'image|file|max:1024',
            'nama_perusahaan' => 'required',
            'email_perusahaan' => ['required', 'string', 'email', 'max:255'],
            'no_hp_perusahaan' => 'required|numeric',
            'dokumen' => 'mimes:pdf|max:1024'
        ]);

        if ($request->file('logo')) {
            $data['logo'] = $request->file('logo')->store('mou/logo');
        }

        if (!$request->file('dokumen')) {
            $data['dokumen'] = $mou->dokumen;
        } else {

            // $data['user_id'] = Auth::user()->id;
            $data['dokumen'] = $request->file('dokumen')->store('mou/dokumen');
        }


        Mou::where('id', $mou->id)
            ->update($data);

        return redirect()->route('mou.index')->with('message', 'Berhasil mengubah data Mou');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mou $mou)
    {
        if (Auth::user()->role_id == 1) {
            Mou::where('id', $mou->id)
                ->delete();

            return redirect()->route('mou.index')->with('message', 'berhasil menghapus kerjasama');
        } else {

            $update = date($mou->updated_at);

            $hapus = date('Y-m-d', strtotime('+7 days'));

            if ($mou->status == 'acc') {
                if ($update > $hapus) {
                    Mou::where('id', $mou->id)
                        ->delete();

                    return redirect()->route('mou.index')->with('message', 'berhasil membatalkan kerjasama');
                } else {

                    return redirect()->route('mou.index')->with('message', 'Anda bisa melakukan pembatalan kerjasama setelah 7 hari');
                }
            } else {
                Mou::where('id', $mou->id)
                    ->delete();

                return redirect()->route('mou.index')->with('message', 'berhasil menghapus kerjasama');
            }
        }
    }

    public function approve(Request $request)
    {
        $id = $request->input('id');
        $nama = $request->input('nama_perusahaan');

        $data =  $request->validate([
            'deskripsi' => 'required',
            'dokumen' => 'required|mimes:pdf|max:1024'
        ]);

        $data['dokumen'] = $request->file('dokumen')->store('mou/dokumen/balasan');

        $data['user_id'] = Auth::user()->id;
        $data['mou_id'] = $id;

        Balasan::create($data);

        Mou::where('id', $id)->update([
            'status' => 'acc'
        ]);

        return redirect()->route('mou.index')->with('success', 'Berhasil malakukan acc pada perusahan   ' . $nama . ' ');
    }

    public function balasan()
    {

        $breadcrumbs = [
            'Dashboard' => route('dashboard.index'),
            'MOU' => route('mou.index'),
            'Detail Balasan' => route('mou.balasan')
        ];

        $balasan = DB::table('balasans')
            ->join('mous', 'mous.id', '=', 'balasans.mou_id')
            ->join('users', 'users.id', '=', 'balasans.user_id')
            ->where('mous.user_id', '=', Auth::user()->id)
            ->first();


        // $mou = Mou::with(['user', 'balasans'])->where('user_id', Auth::user()->id)->first();

        // $balasan = new Collection($collection);
        // dd($balasan);
        if (!$balasan) {
            return redirect()->route('mou.index')->with('message', 'tunggu😓. Kami sedang melakukan pengecakan data anda');
        }

        return view('mou.balasan', compact('breadcrumbs', 'balasan'));
    }
}
