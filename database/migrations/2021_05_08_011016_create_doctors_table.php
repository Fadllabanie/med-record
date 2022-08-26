<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('code')->nullable();
            $table->string('full_name')->nullable();
            $table->string('mobile')->nullable();
            $table->unsignedBigInteger('specialization_id')->index()->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->unsignedBigInteger('country_id')->index()->nullable();
            $table->unsignedBigInteger('city_id')->index()->nullable();
            $table->decimal('lng', 10, 7)->nullable();
            $table->decimal('lat', 10, 7)->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
