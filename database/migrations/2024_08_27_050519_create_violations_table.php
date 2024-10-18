<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViolationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violations', function (Blueprint $table) {
            $table->id(); // Primary key auto increment
            $table->string('id_number'); // ID karyawan yang melakukan pelanggaran
            $table->string('jenis_pelanggaran'); // Jenis pelanggaran
            $table->date('tanggal_pelanggaran'); // Tanggal pelanggaran
            $table->string('type'); // Tipe pelanggaran, bisa diisi bebas
            $table->text('deskripsi')->nullable(); // Deskripsi pelanggaran
            $table->text('catatan_hrd')->nullable(); // Catatan dari HRD
            $table->timestamps(); // created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('violations');
    }
}
