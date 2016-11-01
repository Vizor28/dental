<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('doctors') && Schema::hasTable('patients')) {

            Schema::create('events', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', 100);
                $table->date('date');

                $table->integer('patient_id')->unsigned();
                $table->integer('doctor_id')->unsigned();

                $table->foreign('patient_id')->references('id')->on('patients');
                $table->foreign('doctor_id')->references('id')->on('doctors');
            });

        }

        if (Schema::hasTable('events')) {

            DB::table('events')->insert([
                'name' => 'Вставить пломбу',
                'date' => '2016-11-10',
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
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
            $table->dropForeign(['doctor_id']);
        });

        Schema::drop('events');
    }
}