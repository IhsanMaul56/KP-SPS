<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class data_mapel extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_mapel';

    protected $fillable = [
        'nama_mapel'
    ];

    //cardinality
    public function pengampu() : HasMany{
        return $this->hasMany(data_pengampu::class, 'mapel_id', 'kode_mapel');
    }

    public function elemen() : HasMany{
        return $this->hasMany(data_elemen::class, 'mapel_id', 'kode_mapel');
    }

    public function formatif() : HasMany{
        return $this->hasMany(nilai_formatif::class, 'mapel_id', 'kode_mapel');
    }

    public function sumatif() : HasOne{
        return $this->hasOne(nilai_sumatif::class, 'mapel_id', 'kode_mapel');
    }

    //invers cardinality
    
}
