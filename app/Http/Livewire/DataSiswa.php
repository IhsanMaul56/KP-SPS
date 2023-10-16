<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class DataSiswa extends Component
{
    public $search = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $siswa = DB::table('data_siswas')
            ->leftJoin('data_tingkats', 'data_siswas.tingkat_id', '=', 'data_tingkats.kode_tingkat')
            ->leftJoin('data_kelas', 'data_siswas.kelas_id', '=', 'data_kelas.kode_kelas')
            ->select(
                'data_siswas.*',
                'data_tingkats.nama_tingkat AS siswa_tingkat',
                'data_kelas.nama_kelas AS siswa_kelas'
            )
            ->where(function ($query) {
                $query->where('data_siswas.nis', 'like', '%' . $this->search . '%')
                      ->orWhere('data_siswas.nama_siswa', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.data-siswa', compact('siswa'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function tampil()
    {
        return view('partials.kurikulum-siswa');
    }
}
