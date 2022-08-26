<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCholesterolTriglyceridesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cholesterol_triglycerides', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->index()->nullable();
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->string('cholesterol');
            $table->string('triglycerides');
            $table->string('measuring_unit');
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
        Schema::dropIfExists('cholesterol_triglycerides');
    }
}
