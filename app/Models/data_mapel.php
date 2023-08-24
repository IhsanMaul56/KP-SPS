<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class data_mapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mapel'
    ];

    //cardinality
    public function pengampu() : HasOne{
        return $this->hasOne(data_guru::class, 'pengampu_id', 'kode_mapel');
    }

    public function nilaiSementara() : HasMany{
        return $this->hasMany(data_nilai_sementara::class, 'mapel_id', 'kode_mapel');
    }

    public function jadwal() : HasMany{
        return $this->hasMany(data_jadwal::class, 'mapel_id', 'kode_mapel');
    }

    public function nilaiAkhir() : HasMany{
        return $this->hasMany(data_nilai_akhir::class, 'mapel_id', 'kode_mapel');
    }

    //invers cardinality
}
