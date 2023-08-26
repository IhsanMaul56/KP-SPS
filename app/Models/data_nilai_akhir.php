<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class data_nilai_akhir extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_ajar',
        'kb_pengetahuan',
        'nilai_pengetahuan',
        'desc_pengetahuan',
        'kb_keterampilan',
        'nilai_keterampilan',
        'desc_keterampilan'
    ];

    //cardinality


    //invers cardinality
}
