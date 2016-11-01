<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chaps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        if (Schema::hasTable('chaps')) {
            DB::table('chaps')->insert(['name' => 'Верхняя челюсть']);
            DB::table('chaps')->insert(['name' => 'Нижняя челюсть']);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chaps');
    }
}
