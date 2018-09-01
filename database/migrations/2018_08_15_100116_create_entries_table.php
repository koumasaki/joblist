<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('job_id')->unsigned()->index();
            $table->string('job_name');
            $table->string('job_place');
            $table->string('name');
            $table->string('gender');
            $table->string('birthday');
            $table->string('mail');
            $table->string('tel');
            $table->string('zip');
            $table->string('address');
            $table->text('carreer')->nullable();
            $table->text('qualification')->nullable();
            $table->text('myself')->nullable();
            $table->string('status')->default('未対応');
            $table->timestamps();
            
            //外部キー制約
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
