<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->unsignedBigInteger('region_code')->nullable();
            $table->unsignedBigInteger('management_code')->nullable();
            $table->unsignedBigInteger('institute_code')->nullable();
            $table->integer('active_management')->default(0);
            $table->integer('active_region')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
