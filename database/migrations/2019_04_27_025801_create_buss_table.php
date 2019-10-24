<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBussTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('omeleth_webapp')->create('buss', function (Blueprint $table) {
            $table->bigIncrements('buss_id');
            $table->string('buss_name');
            $table->string('buss_dir');
            $table->string('buss_phone');
            $table->string('buss_url');
            $table->string('cover_url');
            $table->integer('buss_limits')->default(4);
            $table->boolean('active')->default(1);
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
        Schema::connection('omeleth_webapp')->dropIfExists('buss');
    }
}
