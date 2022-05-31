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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('users_id');
            $table->string('email')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->longtext('address');
            $table->string('phone')->nullable();

            $table->string('status');
            $table->string('asal_pt');
            $table->string('prodi')->nullable();
            $table->string('jenjang');
            $table->string('angkatan')->nullable();

            $table->string('nama_wali')->nullable();
            $table->string('phone_wali')->nullable();

            $table->string('keterangan')->default('Proses Seleksi');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
};
