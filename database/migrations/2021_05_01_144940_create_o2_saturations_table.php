<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateO2SaturationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('o2_saturations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->index()->nullable();
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->string('result');
            $table->string('pluse');
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
        Schema::dropIfExists('o2_saturations');
    }
}
