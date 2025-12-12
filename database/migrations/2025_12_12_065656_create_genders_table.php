<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('genders', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_male'); // true = male, false = female
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('genders');
    }
};
