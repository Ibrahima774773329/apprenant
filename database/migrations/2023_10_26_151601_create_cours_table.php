<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('cours', function (Blueprint $table) {

            $table->id();
            $table->string('titre'); // nouveau
            $table->string('contenu'); // nouveau
            $table->string('image'); // nouveau
            $table->integer('duree'); // nouveau
            $table->timestamps();

        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {

        Schema::dropIfExists('contacts');

    }

};