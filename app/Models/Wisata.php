<?php

namespace App\Models;

use App\Models\Paket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wisata extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const WILAYAH = ['Jakarta', 'Jogja', 'Bandung'];

    public function pakets()
    {
        return $this->hasMany(Paket::class);
    }
}
