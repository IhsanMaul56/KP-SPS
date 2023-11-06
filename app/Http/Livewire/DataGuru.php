<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\data_guru;
use App\Models\data_pengampu;
use App\Models\data_wali;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class DataGuru extends Component
{
    public $selectedGuru;
    public $confirmingGuruDeletion;
    public $search = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.data-guru', [
            'dagur' => data_guru::where('nip', 'like', '%'.$this->search.'%')
            ->orWhere('nama_guru', 'like', '%' . $this->search . '%')
            ->paginate(10)
        ]);
    }

    public function deleteGuruConfirm($nip)
    {
        $this->selectedGuru = data_guru::find($nip);
    }


    public function deleteGuru()
    {
        if ($this->selectedGuru) {
            User::where('guru_id', $this->selectedGuru->nip)->delete();
            data_wali::where('wali_id', $this->selectedGuru->nip)->delete();
            data_pengampu::where('pengampu_id', $this->selectedGuru->nip)->delete();
            data_guru::where('nip', $this->selectedGuru->nip)->delete();
            
            Session::flash('berhasil', 'Data Berhasil Dihapus');
        }

        $this->resetPage();
        return redirect()->route('master-guru');
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function tampil(){
        return view('partials.master-guru');
    }
}