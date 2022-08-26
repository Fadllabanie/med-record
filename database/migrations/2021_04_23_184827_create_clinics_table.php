<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->unsignedBigInteger('doctor_id')->index()->nullable();
            $table->string('name');
            $table->longText('describe_specialize');
            $table->string('email')->nullable();
            $table->string('mobile');
            $table->string('logo')->nullable();
            $table->string('another_mobile')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('signature_text')->nullable();
            $table->string('signature_image')->nullable();
            $table->string('attachment')->nullable();
            $table->boolean('is_display')->default(true);
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
        Schema::dropIfExists('clinics');
    }
}
