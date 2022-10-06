<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlwaysForeverToScreenSavers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('screen_savers', function (Blueprint $table) {
            $table->boolean('always')->nullable();
            $table->boolean('forever')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('screen_savers', function (Blueprint $table) {
            //
        });
    }
}
