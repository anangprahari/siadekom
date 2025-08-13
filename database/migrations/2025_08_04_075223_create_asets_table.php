<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_sub_rincian_objek_id')->constrained('sub_sub_rincian_objeks')->cascadeOnDelete();
            $table->string('kode_barang');
            $table->string('nama_bidang_barang');
            $table->string('register');
            $table->string('nama_jenis_barang');
            $table->string('merk_type')->nullable();
            $table->string('no_sertifikat')->nullable();
            $table->string('no_plat_kendaraan')->nullable();
            $table->string('no_pabrik')->nullable();
            $table->string('no_casis')->nullable();
            $table->string('bahan')->nullable();
            $table->string('asal_perolehan');
            $table->string('tahun_perolehan');
            $table->string('ukuran_barang_konstruksi')->nullable();
            $table->string('satuan');
            $table->enum('keadaan_barang', ['B', 'KB', 'RB',]);
            $table->integer('jumlah_barang');
            $table->decimal('harga_satuan', 15, 2);
            $table->string('bukti_barang')->nullable();
            $table->string('bukti_berita')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asets');
    }
};
