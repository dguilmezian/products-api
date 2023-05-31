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
            $table->increments('id');
            $table->unsignedInteger('id_category');
            $table->unsignedInteger('id_brand');
            $table->string('image', 255)->nullable();
            $table->string('description', 100);
            $table->string('name', 100);
            $table->integer('price');
            $table->integer('price_sale');
            $table->integer('stock')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_category')->references('id')->on('categories')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('id_brand')->references('id')->on('brands')->onDelete('NO ACTION')->onUpdate('NO ACTION');
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
