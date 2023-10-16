@include('livewire.create-jurusan')
@include('livewire.update-jurusan')

<div class="card-body h-100 overflow-auto">
    <div class="col">
        <div class="col mb-3 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#InsertJurusan">
                <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah
            </button>
        </div>
        <table class="table table-bordered">
            <thead>
                @foreach ($dajur as $index => $item)
                <tr class="text-center">
                    <td>{{ $dajur->firstItem() + $index }}</td>
                    <td class="text-start">{{ $item->nama_jurusan}}</td>
                    <td class="text-start">{{ $item->nama_guru}}</td>
                    <td>{{ $this->countKelas( $item->kode_jurusan) }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#UpdateJurusan">
                            <i class="bi bi-pencil-square text-white"></i>
                        </button>
                            <span class="btn btn-danger"><i class="bi bi-trash3"></i></span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $dajur->links() }}   
    </div>
</div>