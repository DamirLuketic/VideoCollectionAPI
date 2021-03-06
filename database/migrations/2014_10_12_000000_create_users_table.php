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
            $table->integer('role_id')->default(4);
            $table->integer('country_id')->nullable();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_active')->default(1);
            $table->string('confirmation_key')->nullable();
            $table->boolean('is_confirmed')->default(0);
            $table->boolean('is_visible')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
