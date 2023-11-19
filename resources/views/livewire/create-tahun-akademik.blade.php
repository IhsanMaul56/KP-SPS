{{-- Modal --}}
@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

<div class="modal fade" id="createTahunTA" tabindex="-1" aria-labelledby="createTahunTALabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTahunTALabel">Tambah Tahun Akademik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tambah-tahun-akademik') }}" method="POST" wire:submit.prevent="createAkademik">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Nama Tahun Akademik :</label>
                                <input wire:model="tahun_akademik" type="text"
                                    class="form-control @error('tahun_akademik') is-invalid @enderror"
                                    placeholder="Masukkan Nama Tahun Akademik">
                                @error('tahun_akademik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Tambah">
                </div>
            </form>
        </div>
    </div>
</div>
