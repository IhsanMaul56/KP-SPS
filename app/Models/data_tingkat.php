<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class data_tingkat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tingkat'
    ];

    //cardinality
    public function wali() : HasOne{
        return $this->hasOne(data_wali::class, 'tingkat_id', 'kode_tingkat');
    }

    public function siswa() : HasMany{
        return $this->hasMany(data_siswa::class, 'tingkat_id', 'kode_tingkat');
    }

    public function jadwal() : HasMany {
        return $this->hasMany(data_jadwal::class, 'tingkat_id', 'kode_tingkat');
    }

    public function kelas() : HasMany{
        return $this->hasMany(data_kelas::class, 'tingkat_id', 'kode_tingkat');
    }

    public function sumatif() : HasMany{
        return $this->hasMany(nilai_sumatif::class, 'siswa_id', 'nis');
    }

    public function formatif() : HasMany{
        return $this->hasMany(nilai_formatif::class, 'siswa_id', 'nis');
    }

    //invers cardinality
}
