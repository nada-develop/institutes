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
            $table->bigInteger('teacher_code');
            $table->string('teacher_name');
            $table->bigInteger('record_number');
            $table->bigInteger('national_ID')->nullable();
            $table->string('gender')->nullable();
            $table->integer('gender_code')->nullable();
            $table->string('job_attitude')->nullable();
            $table->bigInteger('job_attitude_code')->nullable();
            $table->string('region')->nullable();
            $table->bigInteger('region_code')->nullable();
            $table->string('management')->nullable();
            $table->bigInteger('management_code')->nullable();
            $table->string('institute')->nullable();
            $table->bigInteger('institute_code')->nullable();
            $table->string('another_institute')->nullable();
            $table->string('another_institute_code')->nullable();
            $table->string('subject')->nullable();
            $table->string('subject_code')->nullable();
            $table->string('another_subject')->nullable();
            $table->string('another_subject_code')->nullable();
            $table->string('degree')->nullable();
            $table->integer('degree_code')->nullable();
            $table->dateTime('date_of_obtaining')->nullable();
            $table->integer('hiring_type')->nullable();
            $table->dateTime('hiring_date')->nullable();
            $table->dateTime('date_receipt_the_work')->nullable();
            $table->string('group_type')->nullable();
            $table->integer('group_type_code')->nullable();
            $table->string('job_staff')->nullable();
            $table->bigInteger('job_staff_code')->nullable();
            $table->dateTime('job_decision_staff_date')->nullable();
            $table->bigInteger('job_decision_staff_code')->nullable();
            $table->string('qualification_name')->nullable();
            $table->bigInteger('qualification_code')->nullable();
            $table->string('qualification_type')->nullable();
            $table->dateTime('qualification_date')->nullable();
            $table->string('job_name')->nullable();
            $table->bigInteger('job_code')->nullable();
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
