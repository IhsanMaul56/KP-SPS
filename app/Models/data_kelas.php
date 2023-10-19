<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class data_kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kelas',
        'jurusan_id',
        'nama_jurusan',
        'tingkat_id',
        'nama_tingkat',
        'tahun_id',
        'nama_tahun'
    ];

    //cardinality
    public function wali () : HasOne {
        return $this->hasOne(data_wali::class, 'kelas_id', 'kode_kelas');
    }

    public function siswa() : HasMany{
        return $this->hasMany(data_siswa::class, 'kelas_id', 'kode_kelas');
    }

    public function jadwal() : HasOne{
        return $this->hasOne(data_jadwal::class, 'kelas_id', 'kode_kelas');
    }

    public function formatif() : HasMany{
        return $this->hasMany(nilai_formatif::class, 'kelas_id', 'kode_kelas');
    }

    public function sumatif() : HasOne{
        return $this->hasOne(nilai_sumatif::class, 'kelas_id', 'kode_kelas');
    }

    public function nilai() : HasOne{
        return $this->hasOne(data_nilai_sementara::class, 'kelas_id', 'kode_kelas');
    }

    //invers cardinality
    public function jurusan() : BelongsTo{
        return $this->belongsTo(data_jurusan::class, 'jurusan_id', 'kode_jurusan');
    }

    public function tahunAkademik() : BelongsTo{
        return $this->belongsTo(tahun_akademik::class, 'tahun_id    ', 'kode_tahun');
    }

    public function tingkat() : BelongsTo{
        return $this->belongsTo(data_tingkat::class, 'tingkat_id', 'kode_tingkat');
    }
}
