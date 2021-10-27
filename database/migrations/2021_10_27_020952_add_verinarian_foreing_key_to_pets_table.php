<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerinarianForeingKeyToPetsTable extends Migration
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
                ->foreignId("veterinarian_id")
                ->nullable()
                ->constrained();
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
            $table->dropColumn("veterinarian_id");
        });
    }
}
