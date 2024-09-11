<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Periode extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    //invers cardinality
    public function tahun() : BelongsTo {
        return $this->belongsTo(tahun_akademik::class, 'tahun_id', 'kode_tahun');
    }
}
