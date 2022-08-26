<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaysResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rays_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id')->index()->nullable();
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->string('test_type');
            $table->string('test_result');
            $table->string('normal_test_percentage');
            $table->string('doctor_name');
            $table->string('lab_name');
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
        Schema::dropIfExists('rays_results');
    }
}
