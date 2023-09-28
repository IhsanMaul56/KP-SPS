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
        <div class="col p-0" style="z-index: -9999;">
            <div class="grid-kanan">
                @if (Auth::user()->role == 'admin')
                    @include('partials.rightbar_admin')
                @elseif (Auth::user()->role == 'kurikulum')
                    @include('partials.rightbar_kurikulum')
                @elseif (Auth::user()->role == 'guru')
                    @include('partials.rightbar_guru')
                @elseif (Auth::user()->role == 'siswa')
                    @include('partials.rightbar_siswa')
                @endif
            </div>
        </div>
    </div>
@endsection
