<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTheethTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (Schema::hasTable('theeth') && Schema::hasTable('status') && Schema::hasTable('clinics') && Schema::hasTable('doctors') && Schema::hasTable('patients')) {

            Schema::create('users_theeth', function (Blueprint $table) {
                $table->increments('id');
                $table->date('date');
                $table->mediumText('text')->nullable()->comment('Information about thooth and hir status');

                $table->integer('thooth_id')->unsigned();
                $table->integer('status_id')->unsigned();
                $table->integer('clinic_id')->unsigned();
                $table->integer('doctor_id')->unsigned();
                $table->integer('patient_id')->unsigned();

                $table->foreign('thooth_id')->references('id')->on('theeth');
                $table->foreign('status_id')->references('id')->on('status');
                $table->foreign('clinic_id')->references('id')->on('clinics');
                $table->foreign('doctor_id')->references('id')->on('doctors');
                $table->foreign('patient_id')->references('id')->on('patients');
            });

        }

        if (Schema::hasTable('users_theeth')) {
            DB::table('users_theeth')->insert([
                'date' => '2016-09-25',
                'text' => 'Керамическая пломба на передний зуб',
                'thooth_id' => 21,
                'status_id' => 2,
                'clinic_id' => 2,
                'doctor_id' => 1,
                'patient_id' => 1
            ]);
            DB::table('users_theeth')->insert([
                'date' => '2015-07-05',
                'text' => 'Удален',
                'thooth_id' => 31,
                'status_id' => 4,
                'clinic_id' => 2,
                'doctor_id' => 1,
                'patient_id' => 1
            ]);
            DB::table('users_theeth')->insert([
                'date' => '2015-07-05',
                'text' => 'Удален',
                'thooth_id' => 41,
                'status_id' => 4,
                'clinic_id' => 2,
                'doctor_id' => 1,
                'patient_id' => 1
            ]);
            DB::table('users_theeth')->insert([
                'date' => '2016-02-17',
                'text' => 'Дырка',
                'thooth_id' => 14,
                'status_id' => 3,
                'clinic_id' => 2,
                'doctor_id' => 1,
                'patient_id' => 1
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
        Schema::table('users_theeth', function (Blueprint $table) {
            $table->dropForeign(['thooth_id']);
            $table->dropForeign(['status_id']);
            $table->dropForeign(['clinic_id']);
            $table->dropForeign(['doctor_id']);
            $table->dropForeign(['patients_id']);
        });

        Schema::drop('users_theeth');
    }
}