<?php

namespace App\Models;

use App\Models\Paket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Negosiasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['paket', 'user'];

    public function paket()
    {
        return  $this->belongsTo(Paket::class);
    }
    public function user()
    {
        return  $this->belongsTo(User::class);
    }
}
