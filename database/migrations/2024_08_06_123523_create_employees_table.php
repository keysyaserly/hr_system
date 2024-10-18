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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigInteger('id_number')->primary(); // Use bigInteger for id_number if it's not auto increment
            $table->string('full_name');
            $table->string('nickname');
            $table->date('contract_date');
            $table->date('work_date');
            $table->enum('status', ['aktif', 'berhenti']);
            $table->string('position');
            $table->string('nuptk');
            $table->enum('gender', ['pria', 'wanita']);
            $table->string('place_birth');
            $table->date('birth_date');
            $table->string('religion');
            $table->string('email');
            $table->string('hobby');
            $table->enum('marital_status', ['menikah', 'belum']); // Fixed typo
            $table->string('residence_address');
            $table->string('phone');
            $table->string('address_emergency');
            $table->string('phone_emergency');
            $table->string('blood_type');
            $table->string('last_education');
            $table->string('agency');
            $table->integer('graduation_year');
            $table->string('competency_training_place');
            $table->text('organizational_experience');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees'); // Use the correct table name
    }
};
