@extends('layouts.app')
@section('title','Daftar Surat')
@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold text-gray-800">Daftar Surat</h1>
    <a href="{{ route('surats.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Buat Surat</a>
</div>
<table class="min-w-full bg-white border border-gray-300 rounded-lg shadow">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-4 py-2 border-b">Nomor Surat</th>
            <th class="px-4 py-2 border-b">Jenis Surat</th>
            <th class="px-4 py-2 border-b">Tanggal</th>
            <th class="px-4 py-2 border-b">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($surats as $s)
        <tr class="border-t hover:bg-gray-50">
            <td class="px-4 py-2">{{ $s->nomor_surat }}</td>
            <td class="px-4 py-2">{{ $s->jenis->nama }}</td>
            <td class="px-4 py-2">{{ $s->tanggal_surat}}</td>
            <td class="px-4 py-2 space-x-2">
                <a href="{{ route('surats.show',$s) }}" class="text-blue-600 hover:underline">Lihat</a>
                <a href="{{ route('surats.edit',$s) }}" class="text-yellow-600 hover:underline">Edit</a>
                <a href="{{ route('surats.pdf',$s) }}" class="text-green-600 hover:underline">PDF</a>
                <form action="{{ route('surats.destroy',$s) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin diarsipkan?')" class="text-red-600 hover:underline">Arsip</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="mt-4">{{ $surats->links() }}</div>
@endsection
