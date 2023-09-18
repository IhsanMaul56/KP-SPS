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
        'kelas_id',
        'nama_kelas',
        'formatif_id',
        'sumatif_id'
    ];

    //cardinality

    //invers cardinality
    public function kelas() : BelongsTo{
        return $this->belongsTo(data_kelas::class, 'kelas_id', 'kode_kelas');
    }

    public function formatif() : BelongsTo{
        return $this->belongsTo(nilai_formatif::class, 'formatif_id', 'kode_formatif');
    }

    public function sumatif() : BelongsTo{
        return $this->belongsTo(nilai_sumatif::class, 'sumatif_id', 'kode_sumatif');
    }
}
