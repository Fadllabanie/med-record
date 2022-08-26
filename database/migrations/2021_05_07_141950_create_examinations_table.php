<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (Blueprint $table) {
            $table->id();
            $table->string('ar_name');
            $table->string('en_name');
            $table->timestamps();
        });

        DB::table('examinations')->insert([
            'ar_name' => 'اعراض',
            'en_name' => 'Symptoms',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('examinations')->insert([
            'ar_name' => 'تشخيصات',
            'en_name' => 'Diagnostics',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('examinations')->insert([
            'ar_name' => 'ادوية',
            'en_name' => 'Medicines',
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
        Schema::dropIfExists('examinations');
    }
}
