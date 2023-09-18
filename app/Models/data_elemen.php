<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class data_elemen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_elemen',
        'mapel_id',
        'nama_mapel'
    ];

    //cardinality
    public function cp() : HasMany{
        return $this->hasMany(data_cp::class, 'elemen_id', 'kode_elemen');
    }

    //invers cardinality
    public function mapel() : BelongsTo{
        return $this->belongsTo(data_mapel::class, 'mapel_id', 'kode_mapel');
    }
}
