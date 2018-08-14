<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('job_name');
            $table->string('job_status');
            $table->string('job_copy');
            $table->text('detail');
            $table->text('qualification');
            $table->text('salary')->nullable();
            $table->text('allowance')->nullable();
            $table->text('place')->nullable();
            $table->text('time')->nullable();
            $table->text('holiday')->nullable();
            $table->text('bonus')->nullable();
            $table->text('benefit')->nullable();
            $table->string('add_title')->nullable();
            $table->text('add_body')->nullable();
            $table->string('job_image')->nullable();
            $table->text('entry_method')->nullable();
            $table->string('job_category')->nullable();
            $table->string('pref')->nullable();
            $table->string('release');
            $table->string('sender_mail')->nullable();
            $table->timestamps();
            
            //外部キー制約
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
        Schema::dropIfExists('jobs');
    }
}
