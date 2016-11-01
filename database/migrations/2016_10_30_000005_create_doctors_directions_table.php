<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('doctors') && Schema::hasTable('directions')) {

            Schema::create('doctors_directions', function (Blueprint $table) {
                $table->integer('doctor_id')->unsigned();
                $table->integer('direction_id')->unsigned();

                $table->foreign('doctor_id')->references('id')->on('doctors');
                $table->foreign('direction_id')->references('id')->on('directions');
            });

        }


        if (Schema::hasTable('doctors_directions')) {
            DB::table('doctors_directions')->insert(['doctor_id' => 1,'direction_id' => 1]);
            DB::table('doctors_directions')->insert(['doctor_id' => 1,'direction_id' => 3]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors_directions', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->dropForeign(['direction_id']);
        });

        Schema::drop('doctors_directions');
    }
}