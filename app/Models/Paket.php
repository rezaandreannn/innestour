<?php

namespace App\Models;

use App\Models\Wisata;
use App\Models\Negosiasi;
use App\Models\DetailPaket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];



    const NAMA_PAKETS = ['Lampung - Jakarta', 'Lampung - Bandung', 'Lampung - Jogja', 'Lampung - Jakarta - Bandung', 'Lampung - Jakarta - Jogja', 'Lampung - Jakarta - Bandung - Jogja'];


    public function negosiasis()
    {
        return $this->hasMany(Negosiasi::class);
    }
}
