<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBreedForeingKeyToPetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("pets", function (Blueprint $table) {
            $table
                ->foreignId("breed_id")
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
        Schema::table("pets", function (Blueprint $table) {
            $table->dropForeign("breed_id");
        });
    }
}
