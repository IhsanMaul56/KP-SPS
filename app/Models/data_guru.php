<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class data_guru extends Model
{
    use HasFactory;

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
        'kelas_id',
        'pengampu_id'
    ];

    //cardinality
    public function user() : HasOne
    {
        return $this->hasOne(User::class, 'guru_id', 'nip');
    }

    public function kelas() : HasOne{
        return $this->hasOne(data_kelas::class, 'kelas_id', 'nip');
    }

    public function nilaiSementaraPengampu() : HasMany{
        return $this->hasMany(data_nilai_sementara::class, 'pengampu_id', 'nip');
    }

    public function nilaiSementaraWali() : HasOne{
        return $this->hasOne(data_nilai_sementara::class, 'wali_id', 'nip');
    }

    public function nilaiAkhirPengampu() : HasMany{
        return $this->hasMany(data_nilai_akhir::class, 'pengampu_id', 'nip');
    }

    public function nilaiAkhirWali() : HasOne{
        return $this->hasOne(data_nilai_akhir::class, 'wali_id', 'nip');
    }

    //invers acrdinality
    public function mapel() : BelongsTo{
        return $this->belongsTo(data_mapel::class, 'pengampu_id', 'nip');
    }
}
