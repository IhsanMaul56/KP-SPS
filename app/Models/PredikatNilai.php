<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PredikatNilai extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_bobot';

    protected $guarded = [
        'kode_predikat'
    ];

    //invers carbinality
    public function pengampu() : BelongsTo{
        return $this->belongsTo(data_pengampu::class, 'pengampu_id', 'kode_pengampu');
    }
}
