<?php

namespace App\Exports;

use App\Models\data_jadwal;
use App\Models\data_pengampu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JadwalExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'NIP',
            'Nama Guru',
            'Nama Mata Pelajaran',
        ];
    }

    public function collection()
    {
        $guru = data_pengampu::orderBy('nama_guru', 'asc')
            ->select('pengampu_id', 'nama_guru', 'nama_mapel')
            ->get();

        return $guru;
    }
}
