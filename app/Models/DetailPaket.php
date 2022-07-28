<?php

namespace App\Models;

use App\Models\Paket;
use App\Models\Wisata;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPaket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['paket', 'wisata'];


    public function setWisataId($value)
    {
        $this->attributes['wisata_id'] = json_encode($value);
    }

    public function getWisataId($value)
    {
        return $this->attributes['wisata_id'] = json_decode($value);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }
}
