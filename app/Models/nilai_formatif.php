<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class nilai_formatif extends Model
{
    use HasFactory;

    protected $fillable = [
        'mapel_id',
        'nama_mapel',
        'kelas_id',
        'nama_kelas',
        'kuis',
        'tugas'
    ];

    //cardinality
    public function nilai() : HasOne{
        return $this->hasOne(data_nilai_sementara::class, 'formatif_id', 'kode_formatif');
    }

    //invers cardinality
    public function mapel() : BelongsTo{
        return $this->belongsTo(data_mapel::class, 'mapel_id', 'kode_mapel');
    }

    public function kelas() : BelongsTo{
        return $this->belongsTo(data_kelas::class, 'kelas_id', 'kode_kelas');
    }

}
