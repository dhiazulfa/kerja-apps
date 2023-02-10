<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('user_id');
            $table->foreignId('education_id');
            $table->string('nik')->unique();
            $table->string('umur');
            $table->date('tgl_lahir');
            $table->longText('alamat_domisili');
            $table->longText('alamat_ktp');
            $table->longText('pengalaman_kerja');
            $table->string('jenis_kelamin');
            $table->string('status_pernikahan');
            $table->string('foto_ktp');
            $table->string('foto_kk');
            $table->string('foto_ijazah_terakhir');
            $table->string('foto_sertifikat_pengalaman')->nullable();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE employees AUTO_INCREMENT = 10000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
