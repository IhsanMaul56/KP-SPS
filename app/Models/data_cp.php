<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class data_cp extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_cp',
        'elemen_id',
        'nama_elemen'
    ];

    //cardinality

    //invers cardinality
    public function elemen() : BelongsTo{
        return $this->belongsTo(data_elemen::class, 'elemen_id', 'kode_elemen');
    }
}
