<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id')->index()->nullable();
            $table->string('code')->nullable();
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('insurance_number')->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->unsignedBigInteger('country_id')->index()->nullable();
            $table->unsignedBigInteger('city_id')->index()->nullable();
            $table->decimal('lng', 10, 7)->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->string('avatar')->nullable();
            $table->string('blood_type');
            $table->string('allergy');
            $table->string('immunity');
            $table->string('chronic_diseases');
            $table->string('surgery');
            $table->text('note');
            $table->date('last_visit')->nullable();
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
