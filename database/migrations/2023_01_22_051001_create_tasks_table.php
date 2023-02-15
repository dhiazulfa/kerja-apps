<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->foreignId('region_id');
            $table->foreignId('subregion_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('excerpt');
            $table->text('body');
            $table->text('alamat');
            $table->string('link_maps')->nulllable();
            $table->int('jumlah_kebutuhan');
            $table->int('umur_min')->nullable();
            $table->int('umur_max')->nullable();
            $table->string('waktu_pekerjaan');
            $table->enum('status', ['active','inactive','ditutup'])->default('inactive');
            $table->enum('jk_pekerja', ['pria','wanita','semua']);
            $table->time('jam_masuk');
            $table->time('jam_selesai');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('punishment');            
            $table->decimal('price',10,2);
            $table->timestamp('publish_at')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
