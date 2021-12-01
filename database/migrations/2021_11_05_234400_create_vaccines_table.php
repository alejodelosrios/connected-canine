<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained();
            $table->date('rabies')->nullable()->default(null);
            $table->date('bordetella')->nullable()->default(null);
            $table->date('dhhp')->nullable()->default(null);
            $table->boolean('has_rabies')->default(false);
            $table->boolean('has_bordetella')->default(false);
            $table->boolean('has_dhhp')->default(false);
            $table->string('proof')->nullable();
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
        Schema::dropIfExists('vaccines');
    }
}
