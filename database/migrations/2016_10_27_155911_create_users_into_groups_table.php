<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class CreateUsersIntoGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users') && Schema::hasTable('groups')) {
            Schema::create('users_groups', function (Blueprint $table) {
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');

                $table->integer('group_id')->unsigned();
                $table->foreign('group_id')->references('id')->on('groups');
            });

            $user=User::where('name','admin')->first();

            if(!empty($user)){
                DB::table('users_groups')->insert(['user_id' => $user->id,'group_id' => 1]);
                DB::table('users_groups')->insert(['user_id' => $user->id,'group_id' => 2]);
                DB::table('users_groups')->insert(['user_id' => $user->id,'group_id' => 3]);
                DB::table('users_groups')->insert(['user_id' => $user->id,'group_id' => 4]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_groups');
    }
}
