<?php
namespace App\Http\Controllers;

use App\Models\Surats;
use App\Models\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\PDF;

class SuratController extends Controller {
    public function index() {
        $surats = Surats::with('jenis')->latest()->paginate(10);
        return view('surats.index',compact('surats'));
    }
    public function create() {
        $types = JenisSurat::all();
        return view('surats.create',compact('types'));
    }
    public function store(Request $request) {
        $data = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date', // Validasi tanggal
            'perihal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'isi' => 'required|string',
            'jenis_surat_id' => 'required|exists:jenis_surats,id',
            'file' => 'nullable|file|mimes:pdf|max:2048'
        ]); // sesuaikan dengan kebutuhan validasi field Surat

        // Format tanggal
        $data['tanggal_surat'] = date('Y-m-d', strtotime($request->tanggal_surat));

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('surat_pdfs');
        }

        $data['created_by'] = auth()->id();
        Log::info('Surat created by user ID: ' . $data['created_by'], $data);
        Surats::create($data);

        return redirect()->route('surats.index');
    }
    public function show(Surats $surat) { return view('surats.show',compact('surat')); }
    public function edit(Surats $surat) { $types=JenisSurat::all(); return view('surats.edit',compact('surat','types')); }
    public function update(Request $request, Surats $surat) {
        $data = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'isi' => 'required|string',
            'jenis_surat_id' => 'required|exists:jenis_surats,id',
            'file' => 'nullable|file|mimes:pdf|max:2048'
        ]);

        $data['tanggal_surat'] = date('Y-m-d', strtotime($request->tanggal_surat));

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('surat_pdfs');
        }

        $surat->update($data);

        return redirect()->route('surats.index');
    }
    public function destroy(Surats $surat) { $surat->delete(); return back(); }
    public function exportPdf(Surats $surat) {
        $safeNomorSurat = str_replace(['/', '\\'], '-', $surat->nomor_surat); // Ganti karakter tidak valid
        $pdf = app( PDF::class)->loadView('surats.pdf', compact('surat'));
        return $pdf->download("Surat_{$safeNomorSurat}.pdf");
    }
}