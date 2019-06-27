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
            $table->string('client_first');
            $table->string('client_last')->nullable();
            $table->string('username', 191)->nullable();
            $table->string('password', 191)->nullable();
            $table->string('email', 191)->unique();
            $table->string('avatar', 191)->nullable();
            $table->boolean('active')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            //$table->string('activation_token');
            $table->rememberToken();
            $table->string('provider_id', 191)->nullable();
            $table->string('provider_name')->default('Omeleth');
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
