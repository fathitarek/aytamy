<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->text('image');
            $table->integer('country_id')->unsigned();
            $table->integer('dream_id')->unsigned();
            $table->integer('job_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('education_id')->unsigned();
            $table->integer('nationality_id')->unsigned();
            $table->date('date_birth');
            $table->text('personal_id');
            $table->text('mother_certificate');
            $table->text('father_certificate');
            $table->text('education_certificate');
            $table->integer('whats_app');
            $table->integer('parent_mobile');
            $table->integer('type');
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('dream_id')->references('id')->on('dreams');
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('education_id')->references('id')->on('educations'); 
            $table->foreign('nationality_id')->references('id')->on('nationalities'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
