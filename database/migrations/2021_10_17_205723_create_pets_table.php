<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("pets", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("user_id")
                ->constrained()
                ->onDelete("cascade");


            $table->string("name")->nullable();
            $table->string("profile_photo_path", 2048)->nullable();
            $table->datetime("birthday")->nullable();
            $table->enum("sex", ["male", "female"])->nullable();
            $table->decimal("weight")->nullable();
            $table->string("question")->nullable();
            $table->string("step")->nullable();
            $table->timestamps();
            $table
            ->foreignId("breed_id")
            ->nullable()
            ->constrained()
            ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("pets");
    }
}
