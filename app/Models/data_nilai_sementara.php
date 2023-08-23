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
        'siswa_id',
        'kelas_id',
        'tahun_ajar',
        'mapel_id',
        'pengampu_id',
        'wali_id',
        'nilai_kehadiran',
        'nilai_tugas',
        'kb_pengetahuan',
        'nilai_pengetahuan',
        'desc_pengetahuan',
        'kb_keterampilan',
        'nilai_keterampilan',
        'desc_keterampilan',
        'nilai_uts',
        'nilai_uas'
    ];

    //cardinality
    

    //invers cardinality
    public function kelas() : BelongsTo{
        return $this->belongsTo(data_kelas::class, 'kelas_id', 'kode_kelas');
    }

    public function siswa() : BelongsTo{
        return $this->belongsTo(data_siswa::class, 'siswa_id', 'nis');
    }

    public function mapel() : BelongsTo{
        return $this->belongsTo(data_mapel::class, 'mapel_id', 'kode_mapel');
    }

    public function pengampu() : BelongsTo{
        return $this->belongsTo(data_guru::class, 'pengampu_id', 'nip');
    }

    public function wali() : BelongsTo{
        return $this->belongsTo(data_guru::class, 'wali_id', 'nip');
    }
}
