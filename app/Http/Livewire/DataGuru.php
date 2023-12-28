<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\data_guru;
use App\Models\data_jadwal;
use App\Models\data_jurusan;
use App\Models\data_kajur;
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
    public $nip = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $dagur = data_guru::where('is_delete', 0)
        ->where(function ($query) {
            $query->orWhere('nip', 'like', '%' . $this->search . '%');
            $query->orWhere('nama_guru', 'like', '%' . $this->search . '%');
        })
        ->paginate(10);

        $guruDelete = data_guru::select('nip', 'nama_guru')->where('is_delete', 1)->orderByDesc('updated_at')->get();

        return view('livewire.data-guru', [
            'dagur'     => $dagur,
            'listGuru'  => $guruDelete
        ]);
    }

    public function deleteGuruConfirm($nip)
    {
        $this->selectedGuru = data_guru::find($nip);
    }

    public function deleteGuru()
    {
        if ($this->selectedGuru) {
            data_jurusan::whereHas('kajur', function ($query) {
                $query->where('guru_id', $this->selectedGuru->nip);
            })->update([
                'kajur_id' => null,
                'nama_guru' => null
            ]);
            data_kajur::where('guru_id', $this->selectedGuru->nip)->delete();
            data_guru::where('nip', $this->selectedGuru->nip)->update(['is_delete' => 1]);

            Session::flash('berhasil', 'Data Berhasil Dihapus');
        }

        $this->resetPage();
        return redirect()->route('master-guru');
    }

    public function restoreData()
    {
        $this->validate([
            'nip' => 'required'
        ]);

        data_guru::where('nip', $this->nip)->update(['is_delete' => 0]);
        Session::flash('berhasil', 'Data Berhasil Dikembalikan');

        return redirect()->route('master-guru');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function tampil()
    {
        return view('partials.master-guru');
    }
}
