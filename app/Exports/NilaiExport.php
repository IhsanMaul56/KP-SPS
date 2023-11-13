<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class NilaiExport implements FromCollection, WithHeadings
{
    protected $siswaData;

    public function __construct($siswaData)
    {
        $this->siswaData = $siswaData;
    }

    public function headings(): array
    {
        return [
            'NIS',
            'Nama',
            'Tingkat',
            'Kelas',
            'Mapel',
            'TUGAS',
            'KUIS',
            'UTS',
            'UAS',
        ];
    }

    public function collection()
    {
        return $this->siswaData->map(function ($siswa) {
            return [
                'NIS' => $siswa->nis,
                'Nama' => $siswa->nama_siswa,
                'Nama Tingkat' => $siswa->nama_tingkat,
                'Nama Kelas' => $siswa->nama_kelas,
                'Mapel' => $siswa->nama_mapel,
                'Tugas' => $siswa->tugas,
                'Kuis' => $siswa->kuis,
                'UTS' => $siswa->uts,
                'UAS' => $siswa->uas,
            ];
        });
    }
}
