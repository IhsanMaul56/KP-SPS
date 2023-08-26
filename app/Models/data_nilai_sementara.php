<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class data_nilai_sementara extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_ajar',
        'nilai_kehadiran',
        'nilai_tugas',
        'nilai_uts',
        'nilai_uas'
    ];

    //cardinality
    

    //invers cardinality
}
