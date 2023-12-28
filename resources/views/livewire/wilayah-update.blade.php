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
                <select class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" wire:model="provinsi" name="provinsi" wire:change="changeProvince($event.target.value)">
                    <option value="{{ $guru['provinsi_id'] }}" hidden selected>{{ $guru['provinsi'] }}</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                </select>
                @error('provinsi')
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
                <select class="form-control @error('kota') is-invalid @enderror" id="kota" wire:model="kota" name="kota" wire:change="changeCity($event.target.value)">
                    <option value="{{ $guru['kota_id'] }}" hidden selected">{{ $guru['kota'] }}</option>
                    @if ($citys)
                        @foreach ($citys as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    @endif
                </select>
                @error('kota')
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
                <select class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" wire:model="kecamatan" name="kecamatan" wire:change="changeDistrict($event.target.value)">
                    <option value="{{ $guru['kecamatan_id'] }}" hidden selected>{{ $guru['kecamatan'] }}</option>
                    @if ($districts)
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    @endif
                </select>
                @error('kecamatan')
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
                <select class="form-control @error('desa') is-invalid @enderror" id="desa" wire:model="desa" name="desa">
                    <option value="{{ $guru['desa_id'] }}" hidden selected">{{ $guru['desa'] }}</option>
                    @if ($villages)
                        @foreach ($villages as $village)
                            <option value="{{ $village->id }}">{{ $village->name }}</option>
                        @endforeach
                    @endif
                </select>
                @error('desa')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>