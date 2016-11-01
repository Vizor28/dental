<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTableDoctorsCliniks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors_cliniks', function (Blueprint $table) {
            //
            $table->rename('doctors_clinics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors_clinics', function (Blueprint $table) {
            //
            $table->rename('doctors_cliniks');
        });
    }
}
