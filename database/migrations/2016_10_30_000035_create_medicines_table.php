<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('doctors') && Schema::hasTable('patients')) {

            Schema::create('medicines', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', 255);
                $table->string('dose', 45);
                $table->string('count_of_day', 45);
                $table->integer('count_days');
                $table->date('date');

                $table->integer('doctor_id')->unsigned();
                $table->integer('patient_id')->unsigned();

                $table->foreign('doctor_id')->references('id')->on('doctors');
                $table->foreign('patient_id')->references('id')->on('patients');
            });

        }

        if (Schema::hasTable('medicines')) {

            DB::table('medicines')->insert([
                'name' => 'Нимисыл',
                'dose' => '10 грам',
                'count_of_day' => '2 рази',
                'count_days' => 10,
                'date' => '2016-11-01',
                'doctor_id' => 1,
                'patient_id' => 1,
            ]);

        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicines', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->dropForeign(['patient_id']);
        });

        Schema::drop('medicines');
    }
}