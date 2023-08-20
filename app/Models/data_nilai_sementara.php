<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_nilai_sementara extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'jurusan',
        'kelas',
        'tahun_ajar',
        'kode_mapel',
        'nama_mapel',
        'nip_pengampu',
        'nama_pengampu',
        'nip_guru_wali',
        'nama_guru_wali',
        'nilai_kehadiran',
        'nilai_tugas',
        'kb_pengetahuan',
        'nilai_pengetahuan',
        'desc_pengetahuan',
        'kb_keterampilan',
        'nilai_keterampilan',
        'desc_keterampilan',
        'nilai_uts',
        'nilai_uas'
    ];
}
