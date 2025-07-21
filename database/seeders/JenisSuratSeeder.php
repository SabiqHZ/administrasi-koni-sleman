<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisSurat;

class JenisSuratSeeder extends Seeder {
    public function run() {
        $types = [
            ['nama' => 'Surat Undangan', 'deskripsi' => 'Undangan resmi kegiatan KONI Sleman'],
            ['nama' => 'Surat Permohonan', 'deskripsi' => 'Permohonan fasilitas atau dukungan'],
            ['nama' => 'Surat Pemberitahuan', 'deskripsi' => 'Pemberitahuan jadwal atau perubahan'],
            ['nama' => 'Surat Tugas', 'deskripsi' => 'Penugasan personel untuk acara'],
        ];
        foreach ($types as $type) {
            JenisSurat::updateOrCreate(['nama' => $type['nama']], $type);
        }
    }
}
