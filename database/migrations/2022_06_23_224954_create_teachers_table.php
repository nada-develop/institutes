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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('job_title_code');
            $table->bigInteger('code');
            $table->string('subject_code')->nullable();
            $table->string('another_subject')->nullable();
            $table->bigInteger('institute_code')->nullable();
            $table->string('another_institute')->nullable();
            $table->bigInteger('region_code')->nullable();
            $table->bigInteger('management_code')->nullable();
            $table->string('efficiency_code')->nullable();
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
        Schema::dropIfExists('teachers');
    }
};
