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
        Schema::create('institutes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('region_code')->nullable();
            $table->unsignedBigInteger('management_code')->nullable();
            $table->bigInteger('code');
            $table->string('name');
            $table->bigInteger('type_code')->nullable();
            $table->bigInteger('class_code')->nullable();
            $table->bigInteger('gender_code')->nullable();
            $table->string('institute_type')->nullable();
            $table->string('class_name')->nullable();
            $table->string('gender')->nullable();

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
        Schema::dropIfExists('institutes');
    }
};
