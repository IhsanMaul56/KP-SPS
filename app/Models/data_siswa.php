<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class data_siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'nama_siswa',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'no_hp',
        'provinsi',
        'kota',
        'desa',
        'rt',
        'rw',
        'alamat',
        'nik_ayah',
        'nama_ayah',
        'pekerjaan_ayah',
        'nik_ibu',
        'nama_ibu',
        'pekerjaan_ibu',
        'provinsi_ortu',
        'kota_ortu',
        'desa_ortu',
        'rt_ortu',
        'rw_ortu',
        'alamat_ortu',
        'foto_siswa',
        'kelas_id'
    ];

    //cardinality
    public function user() : HasOne
    {
        return $this->hasOne(User::class, 'siswa_id', 'nis');
    }

    //invers cardinality
    public function kelas() : BelongsTo{
        return $this->belongsTo(data_kelas::class, 'kelas_id', 'kode_kelas');
    }
}
