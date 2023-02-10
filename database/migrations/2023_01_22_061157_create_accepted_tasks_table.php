<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcceptedTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accepted_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id');
            $table->foreignId('employee_id');
            $table->enum('status', ['inactive','accepted', 'on_progress', 'done', 'ditolak']);
            $table->string('foto_bukti')->nullable();
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
        Schema::dropIfExists('accepted_tasks');
    }
}
