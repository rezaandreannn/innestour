<?php

namespace App\Models;

use App\Models\User;
use App\Models\Balasan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mou extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }

    public function balasan()
    {
        return  $this->belongsTo(Balasan::class);
    }
}
