<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrintingSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printing_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id')->index()->nullable();
            $table->tinyInteger('left');
            $table->tinyInteger('right');
            $table->tinyInteger('top');
            $table->tinyInteger('bottom');
            $table->boolean('add_signature');
            $table->boolean('add_diagnosis');
            $table->string('settings');
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
        Schema::dropIfExists('printing_settings');
    }
}
