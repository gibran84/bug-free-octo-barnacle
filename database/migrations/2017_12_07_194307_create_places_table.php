<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {

            $table->increments('id');
            
            $table->integer('user_id');

            $table->text('name');

            $table->timestamps();

        });
        
        Schema::create('user_place', function (Blueprint $table) {
            
            $table->integer('user_id');
            
            $table->integer('place_id');
            
            $table->primary(['user_id', 'place_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
