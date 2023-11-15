<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengumumaan extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_pengumuman';

    protected $fillable = [
        'deskripsi',
        'guru_id',
        'nama_guru',
        'tingkat_id',
        'nama_tingkat',
        'kelas_id',
        'nama_kelas',
        'mapel_id',
        'nama_mapel',
    ];

    // invers cardinality
    public function guru() : BelongsTo{
        return $this->belongsTo(data_guru::class, 'guru_id', 'nip');
    }

    public function tingkat() : BelongsTo{
        return $this->belongsTo(data_tingkat::class, 'tingkat_id', 'kode_tingkat');
    }

    public function kelas() : BelongsTo{
        return $this->belongsTo(data_kelas::class, 'kelas_id', 'kode_kelas');
    }

    public function mapel() : BelongsTo{
        return $this->belongsTo(data_pengampu::class, 'mapel_id', 'nama_mapel');
    }
}