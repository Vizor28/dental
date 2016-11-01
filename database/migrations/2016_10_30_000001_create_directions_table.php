<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
        });

        if (Schema::hasTable('directions')) {
            DB::table('directions')->insert(['name' => 'ортодонт']);
            DB::table('directions')->insert(['name' => 'ортопед']);
            DB::table('directions')->insert(['name' => 'имплантолог']);
            DB::table('directions')->insert(['name' => 'Стоматолог-хирург']);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('directions');
    }
}