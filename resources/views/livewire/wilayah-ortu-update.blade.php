<div class="col">
    <div class="row mb-3 align-items-center">
        <div class="col-3">
            <span>Provinsi</span>
        </div>
        <div class="col-auto">
            <span>:</span>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <select class="form-control @error('provinsi_ortu') is-invalid @enderror" id="provinsi_ortu" wire:model="provinsi_ortu" name="provinsi_ortu" wire:change="changeProvince($event.target.value)">
                    <option value="{{ $siswa['provinsi_id'] }}" hidden selected>{{ $siswa['provinsi'] }}</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                </select>
                @error('provinsi_ortu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-3 align-items-center">
        <div class="col-3">
            <span>Kota</span>
        </div>
        <div class="col-auto">
            <span>:</span>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <select class="form-control @error('kota_ortu') is-invalid @enderror" id="kota_ortu" wire:model="kota_ortu" name="kota_ortu" wire:change="changeCity($event.target.value)">
                    <option value="{{ $siswa['kota_id'] }}" hidden selected>{{ $siswa['kota'] }}</option>
                    @if ($citys)
                        @foreach ($citys as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    @endif
                </select>
                @error('kota_ortu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-3 align-items-center">
        <div class="col-3">
            <span>Kecamatan</span>
        </div>
        <div class="col-auto">
            <span>:</span>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <select class="form-control @error('kecamatan_ortu') is-invalid @enderror" id="kecamatan_ortu" wire:model="kecamatan_ortu" name="kecamatan_ortu" wire:change="changeDistrict($event.target.value)">
                    <option value="{{ $siswa['kecamatan_id'] }}" hidden selected>{{ $siswa['kecamatan'] }}</option>
                    @if ($districts)
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    @endif
                </select>
                @error('kecamatan_ortu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-3 align-items-center">
        <div class="col-3">
            <span>Desa</span>
        </div>
        <div class="col-auto">
            <span>:</span>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <select class="form-control @error('desa_ortu') is-invalid @enderror" id="desa_ortu" wire:model="desa_ortu" name="desa_ortu">
                    <option value="{{ $siswa['desa_id'] }}" hidden selected>{{ $siswa['desa'] }}</option>
                    @if ($villages)
                        @foreach ($villages as $village)
                            <option value="{{ $village->id }}">{{ $village->name }}</option>
                        @endforeach
                    @endif
                </select>
                @error('desa_ortu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>