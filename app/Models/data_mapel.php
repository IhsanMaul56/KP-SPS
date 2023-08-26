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

    protected $fillable = [
        'nama_mapel'
    ];

    //cardinality
    public function pengampu() : HasMany{
        return $this->hasMany(data_pengampu::class, 'mapel_id', 'kode_mapel');
    }

    public function jadwal() : HasMany{
        return $this->hasMany(data_jadwal::class, 'mapel_id', 'kode_mapel');
    }

    //invers cardinality
    
}
