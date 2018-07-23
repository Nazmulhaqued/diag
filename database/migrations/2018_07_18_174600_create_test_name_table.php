<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_names', function (Blueprint $table) {
            $table->increments('test_name_id');
            $table->string('test_name');
            $table->text('test_description')->nullable();
            $table->string('test_price');
            $table->string('test_commission');
            $table->string('publication_status');
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
        Schema::dropIfExists('test_names');
    }
}
