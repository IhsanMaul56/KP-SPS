<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DataSemester extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_semester';

    protected $fillable = [
        'nama_semester',
        'status',
    ];

    //cardinality
    public function akademik() : HasMany{
        return $this->hasMany(tahun_akademik::class, 'semeseter_id', 'kode_semester');
    }

    public function formatif() : HasMany{
        return $this->hasMany(nilai_formatif::class, 'semester_id', 'kode_semester');
    }

    public function sumatif() : HasMany{
        return $this->hasMany(nilai_sumatif::class, 'semester_id', 'kode_semester');
    }

    //invers cardinality
}
