<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('patient_id');
            $table->string('patient_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('doctorrefs_id')->nullable();
            $table->string('test_name')->nullable();
            $table->text('test_result')->nullable();
            $table->string('test_price')->nullable();
            $table->string('commission_total')->nullable();
            $table->string('price_total')->nullable();
            $table->string('total_paid')->nullable();
            $table->string('total_due')->nullable();
            $table->string('publicationStatus')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
