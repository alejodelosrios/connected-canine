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

            //$table->unsignedBigInteger("veterinarian_id")->nullable();
            $table->string("name");
            $table->string("profile_photo_path", 2048)->nullable();
            $table->timestamp("birthday");
            $table->enum("sex", ["male", "female"]);
            $table->decimal("weight");
            $table->string("question");
            $table->timestamps();

            //$table
            //->foreign("veterinarian_id")
            //->references("id")
            //->on("pets")
            //->onDelete("set null");
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
