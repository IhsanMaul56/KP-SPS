<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_mapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mapel',
        'nip',
        'nama_guru'
    ];
}
