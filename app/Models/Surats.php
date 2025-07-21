<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Surats extends Model {
    use SoftDeletes;
    protected $casts = [
    'tanggal_surat' => 'date',
];
    protected $fillable = ['jenis_surat_id','nomor_surat','tanggal_surat','perihal','tujuan','isi','file_path','created_by'];
    public function jenis() { return $this->belongsTo(JenisSurat::class,'jenis_surat_id'); }
    public function creator() { return $this->belongsTo(User::class,'created_by'); }
}
