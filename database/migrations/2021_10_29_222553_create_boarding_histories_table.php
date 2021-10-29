<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boarding_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained();
            $table->boolean('attendend');
            $table->boolean('scuffle_event');
            $table->tinyText('scuffle_description');
            $table->boolean('forbidden_assistance');
            $table->boolean('accomodations');
            $table->tinyText('accomodations_description');
            $table->tinyText('commnets');
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
        Schema::dropIfExists('boarding_histories');
    }
}
