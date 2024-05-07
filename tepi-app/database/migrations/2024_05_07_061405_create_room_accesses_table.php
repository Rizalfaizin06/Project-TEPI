<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_accesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id');
            $table->foreignId('student_id')->nullable();
            $table->foreignId('room_id');
            $table->date('date');
            $table->time('time_start');
            $table->time('time_end');
            $table->text('description');
            $table->boolean('confirmation')->default(false);
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
        Schema::dropIfExists('room_accesses');
    }
}
