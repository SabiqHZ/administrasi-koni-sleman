<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_surat_id')->constrained('jenis_surats')->onDelete('cascade');
            $table->string('nomor_surat', 50)->unique();
            $table->date('tanggal_surat');
            $table->date('tanggal_masuk');
            $table->string('perihal', 150);
            $table->string('tujuan', 150);
            $table->text('isi')->nullable();
            $table->string('file_path')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('surats');
    }
};
