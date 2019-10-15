<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Buylimits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Buylimits', function (Blueprint $table) {
            $table->bigIncrements('limits_id');
            $table->integer('buss_id');
            $table->integer('client_id');
            $table->integer('post_id');
            $table->timestamps();
            $table->integer('limit_count')->default(1);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Buylimits');
    }
}
