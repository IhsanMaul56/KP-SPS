<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_guru',
        'nama_mapel',
        'hari',
        'waktu'
    ];
}
