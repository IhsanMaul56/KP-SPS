<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jurusan',
        'nip',
        'nama_kepala_jurusan'
    ];
}
