<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWayfinderToDisplays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('displays', function (Blueprint $table) {
            $table->string('wayfinder_id')->default('dyzbnjsiw');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('displays', function (Blueprint $table) {
            //
        });
    }
}
