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
            $table->string('simple_salary');
            $table->text('salary')->nullable();
            $table->text('allowance')->nullable();
            $table->text('place');
            $table->text('time');
            $table->text('holiday')->nullable();
            $table->text('bonus')->nullable();
            $table->text('benefit')->nullable();
            $table->string('add_title')->nullable();
            $table->text('add_body')->nullable();
            $table->string('job_image')->nullable();
            $table->text('entry_method')->nullable();
            $table->string('simple_form')->nullable();
            $table->string('job_category')->nullable();
            $table->string('zip')->nullable();
            $table->string('pref')->nullable();
            $table->string('state')->nullable();
            $table->string('address')->nullable();
            $table->string('station')->nullable();
            $table->string('salary_type')->nullable();
            $table->integer('salary_low')->nullable();
            $table->integer('salary_high')->nullable();
            $table->text('education')->nullable();
            $table->string('original_category')->nullable();
            $table->string('release');
            $table->string('recruiter')->nullable();
            $table->string('memo')->nullable();
            $table->timestamps();
            
            //外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
