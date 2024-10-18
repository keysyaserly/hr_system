<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToEmployeesAndFamilyDatas extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->softDeletes(); // Menambahkan kolom deleted_at
        });

        Schema::table('family_datas', function (Blueprint $table) {
            $table->softDeletes(); // Menambahkan kolom deleted_at
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Menghapus kolom deleted_at
        });

        Schema::table('family_datas', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Menghapus kolom deleted_at
        });
    }
}
