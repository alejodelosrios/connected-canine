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
            $table->boolean('attendend')->default(0);
            $table->boolean('scuffle_event')->default(0);
            $table->tinyText('scuffle_description')->nullable();
            $table->boolean('forbidden_assistance')->default(0);
            $table->boolean('accomodations')->default(0);
            $table->tinyText('accomodations_description')->nullable();
            $table->tinyText('commnets')->nullable();
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
