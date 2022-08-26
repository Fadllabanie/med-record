<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecializationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specializations', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
        });

        DB::table('specializations')->insert([
            'name_ar' => 'قلبية',
            'name_en' => 'heart',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('specializations')->insert([
            'name_ar' => 'عينية',
            'name_en' => 'Eyes',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specializations');
    }
}
