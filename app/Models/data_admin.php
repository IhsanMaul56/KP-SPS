<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class data_admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_admin'
    ];

    public function user() : HasOne
    {
        return $this->hasOne(User::class, 'admin_id', 'kode_admin');
    }
}
