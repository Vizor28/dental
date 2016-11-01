<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (Schema::hasTable('clinics') && Schema::hasTable('doctors') && Schema::hasTable('patients') && Schema::hasTable('theeth')) {

            Schema::create('records', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('patient_id')->unsigned();
                $table->integer('clinic_id')->unsigned();
                $table->integer('doctor_id')->unsigned();
                $table->integer('thooth_id')->unsigned()->nullable();
                $table->mediumText('message');
                $table->date('date');
                $table->string('picture', 100)->nullable();

                $table->foreign('clinic_id')->references('id')->on('clinics');
                $table->foreign('doctor_id')->references('id')->on('doctors');
                $table->foreign('patient_id')->references('id')->on('patients');
                $table->foreign('thooth_id')->references('id')->on('theeth');
            });

        }

        if (Schema::hasTable('records')) {
            DB::table('records')->insert([
                'date' => '2016-10-31',
                'message' => 'Болит зуб',
                'clinic_id' => 2,
                'doctor_id' => 1,
                'patient_id' => 1,
                'thooth_id' => 24,
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
        Schema::table('records', function (Blueprint $table) {
            $table->dropForeign(['clinic_id']);
            $table->dropForeign(['doctor_id']);
            $table->dropForeign(['patient_id']);
            $table->dropForeign(['thooth_id']);
        });

        Schema::drop('records');
    }
}