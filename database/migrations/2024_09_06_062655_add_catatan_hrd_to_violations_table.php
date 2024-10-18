<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCatatanHrdToViolationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('violations', function (Blueprint $table) {
            // Menambahkan kolom catatan_hrd jika belum ada
            if (!Schema::hasColumn('violations', 'catatan_hrd')) {
                $table->text('catatan_hrd')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('violations', function (Blueprint $table) {
            // Menghapus kolom catatan_hrd jika ada
            if (Schema::hasColumn('violations', 'catatan_hrd')) {
                $table->dropColumn('catatan_hrd');
            }
        });
    }
}
