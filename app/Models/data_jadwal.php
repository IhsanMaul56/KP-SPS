<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class data_jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'mapel_id',
        'hari',
        'waktu'
    ];

    //cardinality
    public function kelas() : HasOne{
        return $this->hasOne(data_kelas::class, 'jadwal_id', 'kode_jadwal');
    }

    //invers cardinality
    public function mapel() : BelongsTo{
        return $this->belongsTo(data_mapel::class, 'mapel_id', 'kode_mapel');
    }
}
