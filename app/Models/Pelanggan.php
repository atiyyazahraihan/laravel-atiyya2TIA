<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    // Mengunci nama tabel agar mengarah ke tabel 'pelanggan' di HeidiSQL
    protected $table = 'pelanggan';

    // Memberitahu Laravel bahwa primary key-nya bukan bernama 'id'
    protected $primaryKey = 'pelanggan_id';

    // Daftar kolom yang diizinkan untuk diisi data massal
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'gender',
        'email',
        'phone'
    ];
}
