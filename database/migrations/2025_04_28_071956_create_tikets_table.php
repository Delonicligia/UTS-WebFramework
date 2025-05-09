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
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan');
            $table->string('email')->unique();
            $table->string('nama_konser');
            $table->date('tanggal_konser')->nullable();
            $table->integer('jumlah_tiket');
            $table->enum('kategori_tiket', ['VIP','Reguler','Festival']);
            $table->enum('status_pemesanan',['Terkonfirmasi','Pending','Dibatalkan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
