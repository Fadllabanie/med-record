<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id')->index();
            $table->string('name_ar');
            $table->string('name_en');
            $table->timestamps();
        });

        DB::table('cities')->insert([
            'country_id' => 1,
            'name_ar' => 'القاهرة',
            'name_en' => 'Cairo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('cities')->insert([
            'country_id' => 1,
            'name_ar' => 'الاسكندريه',
            'name_en' => 'Alexandria',
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
        Schema::dropIfExists('cities');
    }
}
