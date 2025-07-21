<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surats;
use App\Models\JenisSurat;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SuratSeeder extends Seeder {
    public function run() {
        $jeniss = JenisSurat::all();
        foreach ($jeniss as $jenis) {
            for ($i = 1; $i <= 5; $i++) {
                $tanggal = Carbon::now()->subDays(rand(1, 30));
                Surats::updateOrCreate([
                    'nomor_surat' => sprintf('%03d/%s/%d', $i, Str::upper(Str::slug($jenis->nama)), $tanggal->year)
                ], [
                    'jenis_surat_id' => $jenis->id,
                    'tanggal_surat'  => $tanggal->toDateString(),
                    'perihal'        => "Contoh {$jenis->nama} ke-{$i}",
                    'tujuan'         => 'Ketua Cabang ' . Str::title($jenis->nama),
                    'isi'            => 'Isi surat contoh nomor ' . $i . ' untuk jenis ' . $jenis->nama,
                    'file_path'      => null,
                    'created_by'     => 1,
                ]);
            }
        }
    }
}
