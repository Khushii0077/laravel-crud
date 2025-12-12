<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('email')->unique();
            $table->unsignedBigInteger('course_id');
            $table->json('skills')->nullable(); // ARRAY format
            $table->unsignedBigInteger('gender_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};
