<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('display_url')->unique();
            $table->string('company');
            $table->string('zip');
            $table->string('address');
            $table->string('tel')->nullable();
            $table->string('section')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('catch_copy')->nullable();
            $table->string('main_image')->nullable();
            $table->string('logo_image')->nullable();
            $table->string('company_copy')->nullable();
            $table->text('company_summary')->nullable();
            $table->string('establishment')->nullable();
            $table->string('capitalstock')->nullable();
            $table->string('number')->nullable();
            $table->string('president')->nullable();
            $table->string('site_url')->nullable();
            $table->string('privacy_url')->nullable();
            $table->string('service_copy')->nullable();
            $table->text('service_summary')->nullable();
            $table->text('copyright')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
