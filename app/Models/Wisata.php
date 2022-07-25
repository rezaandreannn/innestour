<?php

namespace App\Models;


use App\Models\DetailPaket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wisata extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const WILAYAH = ['Jakarta', 'Jogja', 'Bandung'];

    public function detailpakets()
    {
        return $this->hasMany(DetailPaket::class);
    }
}
