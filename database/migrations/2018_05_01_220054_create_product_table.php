<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_url');
            $table->string('category_url');
            $table->string('subcategory_url')->nullable();
            $table->string('manufacturer_id')->nullable();
            $table->string('productName');
            $table->string('productQuantity');
            $table->string('productPrice');
            $table->date('deals_upto')->nullable();
            $table->text('productShortdescription');
            $table->text('productLongdescription');
            $table->string('productImage');
            $table->string('productImage1')->nullable();
            $table->string('productImage2')->nullable();
            $table->string('productImage3')->nullable();
            $table->string('productImage4')->nullable();
            $table->string('publicationStatus');
            $table->string('hit_count')->nullable();
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
        Schema::dropIfExists('product');
    }
}
