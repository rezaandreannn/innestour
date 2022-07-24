<?php

namespace App\Models;

use App\Models\Wisata;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = 'wisata';



    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }
}
