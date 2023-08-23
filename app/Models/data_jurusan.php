<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class data_jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jurusan',
        'nip',
        'nama_kepala_jurusan'
    ];

    //cardinality
    public function kelas() : HasMany{
        return $this->hasMany(data_kelas::class, 'jurusan_id', 'kode_jurusan');
    }

    //invers cardinality
}
