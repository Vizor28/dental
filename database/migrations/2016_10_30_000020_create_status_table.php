<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 45);
        });

        if (Schema::hasTable('status')) {
            DB::table('status')->insert(['name' => 'Без изменений']);
            DB::table('status')->insert(['name' => 'Вылечен']);
            DB::table('status')->insert(['name' => 'Требует лечения']);
            DB::table('status')->insert(['name' => 'Удален']);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('status');
    }
}