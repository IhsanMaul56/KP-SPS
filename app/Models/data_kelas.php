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
        'jadwal_id'
    ];

    //cardinality
    public function siswa() : HasMany{
        return $this->hasMany(data_siswa::class, 'kelas_id', 'kode_kelas');
    }

    public function nilaiSementara() : HasOne{
        return $this->hasOne(data_nilai_sementara::class, 'kelas_id', 'kode_kelas');
    }

    public function nilaiAkhir() : HasOne{
        return $this->hasOne(data_nilai_akhir::class, 'kelas_id', 'kode_kelas');
    }

    //invers cardinality
    public function wali() : BelongsTo{
        return $this->belongsTo(data_guru::class, 'kelas_id', 'nip');
    }

    public function jurusan() : BelongsTo{
        return $this->belongsTo(data_jurusan::class, 'jurusan_id', 'kode_jurusan');
    }

    public function jadwal() : BelongsTo{
        return $this->belongsTo(data_jadwal::class, 'jadwal_id', 'kode_jadwal');
    }
}
