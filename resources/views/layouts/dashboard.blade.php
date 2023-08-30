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
            @include('livewire.content_admin')
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
                    {{-- @switch($Id)
                        @case(page1)
                            @include('partials.rightbar_siswa')
                            @break
                        @case(page2)
                            @include('partials.rightbar_siswa_profile')
                            @break
                        @default
                    @endswitch     --}}
                {{-- @if ()
                        
                    @elseif()
                        @include('partials.rightbar_siswa_profile') --}}
                        @include('partials.rightbar_siswa')
                @endif
            </div>
        </div>
    </div>
@endsection
