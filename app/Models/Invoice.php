<?php

namespace App\Models;

use App\Models\User;
use App\Models\Paket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = 'paket';

    const BANK = ['BRI - 4523984329923'];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }

    public function paket()
    {
        return  $this->belongsTo(Paket::class);
    }
}
