@extends('layouts.app')
@section('title','Buat Surat')
@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-xl font-bold text-gray-800 mb-4">Buat Surat Baru</h1>
    <form action="{{ route('surats.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block font-semibold">Jenis Surat</label>
            <select name="jenis_surat_id" class="w-full border rounded p-2">
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->nama }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block font-semibold">Nomor Surat</label>
            <input type="text" name="nomor_surat" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label class="block font-semibold">Tanggal Surat</label>
            <input type="date" name="tanggal_surat" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label class="block font-semibold">Tanggal Masuk Surat</label>
            <input type="date" name="tanggal_surat" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label class="block font-semibold">Perihal</label>
            <input type="text" name="perihal" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label class="block font-semibold">Tujuan</label>
            <input type="text" name="tujuan" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label class="block font-semibold">Isi Surat</label>
            <textarea name="isi" rows="5" class="w-full border rounded p-2"></textarea>
        </div>
        <div>
            <label class="block font-semibold">Upload PDF (opsional)</label>
            <input type="file" name="file" accept="application/pdf">
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Simpan</button>
    </form>
</div>
@endsection
