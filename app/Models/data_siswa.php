<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class data_siswa extends Model
{
    use HasFactory;

    protected $guarded = [
        
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
