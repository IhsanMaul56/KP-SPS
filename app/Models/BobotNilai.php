<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BobotNilai extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_bobot';

    protected $fillable = [
        'pengampu_id',
        'foramatif_akhir',
        'sumatif_uts',
        'sumatif_uas',
    ];

    //invers cardinalitu
    public function pengampu() : BelongsTo{
        return $this->belongsTo(data_pengampu::class, 'pengampu_id', 'kode_pengampu');
    }
}
