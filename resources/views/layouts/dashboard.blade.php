@extends('layouts.app')
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
        <div class="col p-0">
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
