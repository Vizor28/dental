<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email', 45)->nullable();
            $table->mediumText('text')->nullable();
            $table->string('picture', 255)->nullable();
            $table->integer('experience');
            $table->timestamps();
        });

        if (Schema::hasTable('doctors')) {
            DB::table('doctors')->insert(['name' => 'Валерий Казаков','email'=>'vizor@poiskovoeprodvigenie.ru','experience'=>15]);

            $user=User::where('name','admin')->first();
            if(!empty($user)){

                DB::table('registers')->insert(['user_id' => $user->id,'registerable_type' => 'App\Doctor','registerable_id' => 1]);

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
        Schema::dropIfExists('doctors');
    }
}
