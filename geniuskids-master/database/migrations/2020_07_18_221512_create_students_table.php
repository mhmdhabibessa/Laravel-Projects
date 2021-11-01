<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('schedule_id');
            $table->unsignedInteger('purchase_order_id');
            $table->string('student_no')->nullable()->default(null);
            $table->unsignedInteger('guardian_id');
            $table->string('name');
            $table->date('dob');
            $table->string('gender');
            $table->string('email');
            $table->unsignedInteger('level')->nullable()->default(null);
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
        Schema::dropIfExists('students');
    }
}
