<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('omeleth_webapp')->create('transactions', function (Blueprint $table) {
            $table->bigIncrements('transaction_id');
            $table->integer('post_id');
            $table->integer('buss_id');
            $table->integer('client_id');
            $table->bigInteger('trans_qr');
            $table->timestamps();
            $table->boolean('finished')->default(0);
            $table->integer('app_id')->default(99);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
