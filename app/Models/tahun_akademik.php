<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class tahun_akademik extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_tahun';

    protected $fillable = [
        'tahun_akademik',
        'semester_id',
        'nama_semester',
        'status',
    ];

    //cardinality
    public function kelas() : HasMany{
        return $this->hasMany(data_kelas::class, 'tahun_id', 'kode_tahun');
    }

    public function formatif() : HasMany{
        return $this->hasMany(nilai_formatif::class, 'tahun_id', 'kode_tahun');
    }

    public function sumatif() : HasMany{
        return $this->hasMany(nilai_sumatif::class, 'tahun_id', 'kode_tahun');
    }

    //invers cardinality
    public function semester() : BelongsTo{
        return $this->belongsTo(DataSemester::class, 'semester_id', 'kode_semester');
    }
}
