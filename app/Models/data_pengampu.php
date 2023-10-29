<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class data_pengampu extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_pengampu';

    protected $fillable = [
        'pengampu_id',
        'nama_guru',
        'mapel_id',
        'nama_mapel'
    ];

    //cardinality
    public function jadwal() : HasMany{
        return $this->hasMany(data_jadwal::class, 'pengampu_id', 'kode_pengampu');
    }

    //invers cardinality
    public function guru() : BelongsTo{
        return $this->belongsTo(data_guru::class, 'pengampu_id', 'nip');
    }

    public function mapel() : BelongsTo{
        return $this->belongsTo(data_mapel::class, 'mapel_id', 'kode_mapel');
    }
}
