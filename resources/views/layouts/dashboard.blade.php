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
        @if (Auth::user()->role == 'admin')
            @include('partials.content_admin')
        @elseif (Auth::user()->role == 'kurikulum')
            @include('partials.content_kurikulum')
        @elseif (Auth::user()->role == 'guru')
            @include('partials.content_guru')
        @elseif (Auth::user()->role == 'siswa')
            @include('partials.content_siswa')
        @endif
        
        @if (Auth::user()->role == 'siswa')
            <div class="col p-0" style="z-index: 7; height:30px; weight:20px;">
                <div class="grid-kanan">
                    @include('partials.rightbar_siswa')
                </div>
            </div>
        @endif
    </div>
@endsection