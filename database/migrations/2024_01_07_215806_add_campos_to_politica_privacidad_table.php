<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposToPoliticaPrivacidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('politica_privacidads', function (Blueprint $table) {
            $table->text('descripcionG1');
            $table->string('imagen');
            $table->text('descripcionG2');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('politica_privacidads', function (Blueprint $table) {
            //
        });
    }
}
