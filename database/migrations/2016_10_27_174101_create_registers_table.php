<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
use App\Patient;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('registerable_type',45);
            $table->integer('registerable_id')->unsigned();
        });

        if (Schema::hasTable('registers') && Schema::hasTable('users') && Schema::hasTable('patients')) {

            $user=User::where('name','admin')->first();
            if(!empty($user)){
                $patient=Patient::where('email',$user->email)->first();
                if(!empty($patient)){
                    DB::table('registers')->insert(['user_id' => $user->id,'registerable_type' => 'App\Patient','registerable_id' => $patient->id]);
                }
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
        Schema::dropIfExists('registers');
    }
}
