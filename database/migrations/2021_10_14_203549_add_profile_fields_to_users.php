<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname', 25)->after('name');
            $table->integer('area_code');
            $table->string('phone_number', 20);
            $table->json('address');
            $table->string('zip_code');
            $table->timestamp('accept_terms')->nullable();
            $table->timestamp('aggreement')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'lastname',
                'area_code',
                'phone_number',
                'address',
                'accept_terms',
                'aggreement',
                'zip_code'
            ]);
        });
    }
}
