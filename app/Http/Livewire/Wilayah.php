<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class Wilayah extends Component
{
    public $provinsi;
    public $provinces;
    public $kota;
    public $citys;
    public $kecamatan;
    public $districts;
    public $desa;
    public $villages;
    public $parameter;

    public function mount()
    {
        $this->provinces = Province::all();
    }

    public function changeProvince($provinceCode)
    {
        $this->kota = null;
        $this->kecamatan = null;
        $this->desa = null;

        $this->citys = Regency::where('province_id', $provinceCode)->get();
    }

    public function changeCity($cityCode)
    {
        $this->kecamatan = null;
        $this->desa = null;

        $this->districts = District::where('regency_id', $cityCode)->get();
    }

    public function changeDistrict($districtCode)
    {
        $this->desa = null;

        $this->villages = Village::where('district_id', $districtCode)->get();
    }

    public function render()
    {
        if (!$this->parameter) {
            return view('livewire.wilayah');
        } else {
            return view('livewire.wilayah-update', ['guru' => $this->parameter]);
        }
    }
}
