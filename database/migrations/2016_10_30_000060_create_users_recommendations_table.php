<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersRecommendationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('recommendations') && Schema::hasTable('doctors') && Schema::hasTable('patients')) {

            Schema::create('users_recommendations', function (Blueprint $table) {
                $table->increments('id');
                $table->date('date');

                $table->integer('recommendation_id')->unsigned();
                $table->integer('doctor_id')->unsigned();
                $table->integer('patient_id')->unsigned();

                $table->foreign('recommendation_id')->references('id')->on('recommendations');
                $table->foreign('doctor_id')->references('id')->on('doctors');
                $table->foreign('patient_id')->references('id')->on('patients');
            });

        }

        if (Schema::hasTable('users_recommendations')) {

            DB::table('users_recommendations')->insert([
                'date' => '2016-11-01',
                'recommendation_id'=>1,
                'doctor_id' => 1,
                'patient_id' => 1,
            ]);
            DB::table('users_recommendations')->insert([
                'date' => '2016-11-02',
                'recommendation_id'=>1,
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
        Schema::table('users_recommendations', function (Blueprint $table) {
            $table->dropForeign(['recommendation_id']);
            $table->dropForeign(['doctor_id']);
            $table->dropForeign(['patient_id']);
        });

        Schema::drop('users_recommendations');
    }
}