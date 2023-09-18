<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tahun_akademik extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_akademik'
    ];

    //cardinality
    public function kelas() : HasMany{
        return $this->hasMany(data_kelas::class, 'tahun_id', 'kode_tahun');
    }

    //invers cardinality
}
