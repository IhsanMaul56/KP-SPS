<?php

namespace App\Exports;

use App\Models\data_kelas;
use App\Models\data_pengampu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class JadwalExport implements FromCollection, WithHeadings, WithMultipleSheets
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

    public function sheets(): array
    {
        $sheets = [];
        $sheets[] = new class implements FromCollection, WithHeadings {
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
        };
        
        $sheets[] = new class implements FromCollection, WithHeadings {
            public function headings(): array
            {
                return [
                    'Nama Kelas',
                    'Nama Tingkat',
                ];
            }

            public function collection()
            {
                $kelas = data_kelas::select('nama_kelas', 'nama_tingkat')->get();
                return $kelas;
            }
        };

        return $sheets;
    }
}
