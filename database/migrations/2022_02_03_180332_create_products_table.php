<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id');
            $table->string('name', 50);
            $table->string('description', 500);
            $table->string('department', 50);
            $table->string('manufacturer', 50);
            $table->double('price', 8, 2);
            $table->string('unit', 10);
            $table->string('format', 50);
            $table->integer('inventory');
            $table->string('image_path', 200);
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
        Schema::dropIfExists('products');
    }
}
