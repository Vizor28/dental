<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('address')->nullable();
            $table->text('cordenat')->nullable();
            $table->mediumText('text')->nullable();
            $table->string('picture', 255)->nullable();
        });

        if (Schema::hasTable('clinics')) {
            DB::table('clinics')->insert(['name' => 'Комфорт']);
            DB::table('clinics')->insert(['name' => 'Дантист']);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clinics');
    }
}