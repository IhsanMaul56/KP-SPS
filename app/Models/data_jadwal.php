<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class data_jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas_id',
        'nama_kelas',
        'mapel_id',
        'nama_mapel',
        'pengampu_id',
        'nama_pengampu',
        'hari',
        'waktu'
    ];

    //invers cardinality
    public function kelas() : BelongsTo{
        return $this->belongsTo(data_kelas::class, 'kelas_id', 'kode_kelas');
    }

    public function mapel() : BelongsTo{
        return $this->belongsTo(data_mapel::class, 'mapel_id', 'kode_mapel');
    }

    public function pengampu() : BelongsTo{
        return $this->belongsTo(data_pengampu::class, 'pengampu_id', 'kode_pengampu');
    }
}
