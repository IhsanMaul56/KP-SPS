@extends('layouts.app')

@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('content')
    <div class="container-fluid p-0">
        @include('partials.sidebar')
        <div class="col p-0">
            <div class="grid-tengah w-100 overflow-auto">
                <div class="row">
                    <div class="col">
                        <span class="h1 fw-bold text-biru">Data Siswa</span></span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                <div class="row p-0 m-0">
                    <div class="card-body h-100 overflow-auto" id="shadow">
                        <div class="row">
                            <div class="col">

                                <label for="editor" class="fs-4">Pengumuman Siswa</label>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form method="post">
                                    <div class="row">
                                        <div class="col">
                                            <textarea id="summernote" name="editordata"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-end">
                                            <input type="submit" class="btn btn-primary mt-3" value="Kirim">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    $('#summernote').summernote({
        placeholder: 'Tambahkan pengumuman',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['codeview', 'help']]
        ]
      });
</script>
@endpush

