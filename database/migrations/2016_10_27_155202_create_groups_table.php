<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',45);
        });

        if (Schema::hasTable('groups')) {
            DB::table('groups')->insert(['name' => 'Администратор']);
            DB::table('groups')->insert(['name' => 'Менеджер']);
            DB::table('groups')->insert(['name' => 'Доктор']);
            DB::table('groups')->insert(['name' => 'Пациент']);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
