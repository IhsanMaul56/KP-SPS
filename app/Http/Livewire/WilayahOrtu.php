<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class WilayahOrtu extends Component
{
    public $provinsi_ortu;
    public $provinces;
    public $kota_ortu;
    public $citys;
    public $kecamatan_ortu;
    public $districts;
    public $desa_ortu;
    public $villages;
    public $parameter;

    public function mount()
    {
        $this->provinces = Province::all();
    }

    public function changeProvince($provinceCode)
    {
        $this->kota_ortu = null;
        $this->kecamatan_ortu = null;
        $this->desa_ortu = null;

        $this->citys = Regency::where('province_id', $provinceCode)->get();
    }

    public function changeCity($cityCode)
    {
        $this->kecamatan_ortu = null;
        $this->desa_ortu = null;

        $this->districts = District::where('regency_id', $cityCode)->get();
    }

    public function changeDistrict($districtCode)
    {
        $this->desa_ortu = null;

        $this->villages = Village::where('district_id', $districtCode)->get();
    }
    
    public function render()
    {
        if (!$this->parameter) {
            return view('livewire.wilayah-ortu');
        } else {
            return view('livewire.wilayah-ortu-update', ['siswa' => $this->parameter]);
        }
    }
}
