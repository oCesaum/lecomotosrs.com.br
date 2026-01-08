<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//use DB;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('brand');
            $table->string('model');
            $table->integer('year')->nullable();
            $table->integer('price')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE products ADD FULLTEXT (title)');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
