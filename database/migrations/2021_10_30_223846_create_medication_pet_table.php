<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicationPetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("medication_pet", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pet_id")->nullable();
            $table->unsignedBigInteger("medication_id")->nullable();
            $table->boolean("status")->nullable();
            $table->string("frequency")->nullable();
            $table->string("time_block")->nullable();
            $table->string("purpose")->nullable();
            $table->boolean("prescription")->nullable();
            $table->string("dosage")->nullable();
            $table->string("instructions")->nullable();

            $table
                ->foreign("medication_id")
                ->references("id")
                ->on("medications");
            $table
                ->foreign("pet_id")
                ->references("id")
                ->on("pets");
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
        Schema::dropIfExists("medication_pet");
    }
}
