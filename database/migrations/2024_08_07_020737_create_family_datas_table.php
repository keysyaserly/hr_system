<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_datas', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->bigInteger('id_number')->unsigned();  // Relasi ke employee (id_number)
            $table->string('mate_name')->nullable();  // Nama pasangan
            $table->string('child_name')->nullable();  // Nama anak
            $table->date('wedding_date')->nullable();  // Tanggal pernikahan
            $table->string('wedding_certificate_number')->nullable();  // Nomor surat nikah
            $table->timestamps();  // Kolom created_at dan updated_at

            // Correct foreign key reference
            $table->foreign('id_number')->references('id_number')->on('employees')
                ->onDelete('cascade');  // If employee is deleted, related data is also deleted
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('family_datas');
    }
};
