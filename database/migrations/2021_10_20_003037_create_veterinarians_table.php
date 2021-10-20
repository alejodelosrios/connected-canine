<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeterinariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("veterinarians", function (Blueprint $table) {
            $table->id();
            $table->foreignId("pet_id")->constrained();
            $table->string("vet_clinic");
            $table->string("vet_address")->nullable();
            $table->string("vet_phone_number");
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
        Schema::dropIfExists("veterinarians");
    }
}
