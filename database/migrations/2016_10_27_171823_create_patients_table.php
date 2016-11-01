<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fio',255);
            $table->string('email',45);
            $table->string('phone',45);
            $table->date('birthday');
            $table->timestamps();
        });

        if (Schema::hasTable('patients')) {
            DB::table('patients')->insert(['fio' => 'Валерий Казаков','email'=>'vizor@poiskovoeprodvigenie.ru','phone'=>'+79268451812','birthday'=>'1985-05-26']);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
