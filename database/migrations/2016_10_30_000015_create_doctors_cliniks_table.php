<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsCliniksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('doctors') && Schema::hasTable('clinics')) {

            Schema::create('doctors_cliniks', function (Blueprint $table) {
                $table->integer('doctor_id')->unsigned();
                $table->integer('clinic_id')->unsigned();

                $table->foreign('doctor_id')->references('id')->on('doctors');
                $table->foreign('clinic_id')->references('id')->on('clinics');
            });

        }

        if (Schema::hasTable('doctors_cliniks')) {
            DB::table('doctors_cliniks')->insert(['doctor_id' => 1,'clinic_id' => 2]);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors_cliniks', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->dropForeign(['clinic_id']);
        });

        Schema::drop('doctors_cliniks');
    }
}