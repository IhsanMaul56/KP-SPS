<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class data_jadwal extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_jadwal';

    protected $fillable = [
        'hari',
        'waktu_masuk',
        'waktu_keluar',
        'tingkat_id',
        'nama_tingkat',
        'kelas_id',
        'nama_kelas',
        'pengampu_id',
    ];

    //invers cardinality
    public function kelas() : BelongsTo{
        return $this->belongsTo(data_kelas::class, 'kelas_id', 'kode_kelas');
    }

    public function pengampu() : BelongsTo{
        return $this->belongsTo(data_pengampu::class, 'pengampu_id', 'kode_pengampu');
    }

    public function tingkat() : BelongsTo{
        return $this->belongsTo(data_tingkat::class, 'tingkat_id', 'kode_tingkat');
    }
}
