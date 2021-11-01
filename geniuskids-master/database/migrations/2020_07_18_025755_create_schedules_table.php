<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('course_id');
            $table->json('name');
            $table->date('min_dob');
            $table->date('max_dob');
            $table->unsignedInteger('level');
            $table->unsignedInteger('max_students')->default(25);
            $table->unsignedBigInteger('booked_students')->default(0);
            $table->date('starts_on');
            $table->date('ends_on');
            $table->json('days_of_week');
            $table->decimal('price', 9, 2);
            $table->boolean('active');
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
        Schema::dropIfExists('schedules');
    }
}
