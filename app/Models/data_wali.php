<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class data_wali extends Model
{
    use HasFactory;

    protected $fillable = [
        'wali_id',
        'nama_guru',
        'kelas_id',
        'nama_kelas'
    ];

    //cardinality

    //invers cardinality
    public function guru() : BelongsTo{
        return $this->belongsTo(data_guru::class, 'wali_id', 'nip');
    }

    public function kelas() : BelongsTo {
        return $this->belongsTo(data_kelas::class, 'kelas_id', 'kode_kelas');
    }
}
