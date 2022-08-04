<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('subject_id');
            $table->string('category_id');
            $table->string('product_name');
            $table->string('product_model')->nullable();
            $table->string('product_company')->nullable();
            $table->string('product_price')->nullable();
            $table->text('product_description')->nullable();
            $table->text('product_nature')->nullable();
            $table->string('product_images');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
