<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("medications", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("pet_id")
                ->nullable()
                ->constrained();
            $table->string("name", 100);
            $table->boolean("status")->nullable();
            $table->string("frequency")->nullable();
            $table->string("time_block")->nullable();
            $table->string("purpose")->nullable();
            $table->boolean("prescription")->nullable();
            $table->string("dosage")->nullable();
            $table->string("instructions")->nullable();
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
        Schema::dropIfExists("medications");
    }
}
