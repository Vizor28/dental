<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecommendationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommendations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 45);
            $table->mediumText('text')->nullable();
        });

        if (Schema::hasTable('recommendations')) {

            DB::table('recommendations')->insert([
                'name' => 'Почистить зубы',
                'text' => 'Каждый день вечером обезательно нужно чистить зубы!'
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
        Schema::drop('recommendations');
    }
}