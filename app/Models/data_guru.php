<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class data_guru extends Model
{
    use HasFactory;

    protected $tabel = 'data_gurus';
    protected $primaryKey = 'nip';

    protected $fillable = [
        'nip',
        'nama_guru',
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
        'foto_guru',
    ];

    //cardinality
    public function user() : HasOne{
        return $this->hasOne(User::class, 'guru_id', 'nip');
    }

    public function pengampu() : HasOne{
        return $this->hasOne(data_pengampu::class, 'pengampu_id', 'nip');
    }

    public function wali() : HasOne{
        return $this->hasOne(data_wali::class, 'wali_id', 'nip');
    }

    public function kajur() :HasOne{
        return $this->hasOne(data_kajur::class, 'guru_id', 'nip');
    }

    public function pengumuman() :HasOne{
        return $this->hasOne(Pengumumaan::class, 'guru_id', 'nip');
    }

    //invers cardinality
}
