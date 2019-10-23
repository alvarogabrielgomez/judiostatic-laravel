<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('omeleth_webapp')->create('posts', function (Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->integer('buss_id');
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->timestamp('offer_end_at')->nullable();
            $table->decimal('price_new', 6,2);
            $table->decimal('price_from', 6,2);
            $table->string('title');
            $table->string('description');
            $table->string('post_hero_img_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
