<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weights', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->index()->nullable();
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->string('weight');
            $table->string('weight_unit');
            $table->string('perfect_weight');
            $table->string('perfect_weight_unit'); 
            $table->string('height');
            $table->string('height_unit');
            $table->string('comment');
            $table->string('status')->default('done');
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
        Schema::dropIfExists('weights');
    }
}
