@extends('layouts.app')
@section('content')
<div>
    {{-- Be like water. --}}
    <table id="myDataTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <!-- Tambahkan kolom lain di sini -->
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama_guru }}</td>
                    <!-- Tambahkan kolom lain di sini -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection
