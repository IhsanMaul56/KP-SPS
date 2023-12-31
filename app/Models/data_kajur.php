<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class data_kajur extends Model
{
    use HasFactory;

    protected $fillable=[
        'guru_id',
        'nama_guru'
    ];

    public $timestamps = true;
    protected $primaryKey = 'kode_kajur';

    //cardinality
    public function jurusan() : HasOne{
        return $this->hasOne(data_jurusan::class, 'kajur_id', 'kode_kajur');
    }

    //invers cardinality
    public function guru () : BelongsTo{
        return $this->belongsTo(data_guru::class, 'guru_id', 'nip');
    }
}
