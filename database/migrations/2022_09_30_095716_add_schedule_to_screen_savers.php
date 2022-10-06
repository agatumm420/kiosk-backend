<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddScheduleToScreenSavers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('screen_savers', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->dateTime('published_since')->nullable();
            $table->dateTime('published_untill')->nullable();
            $table->tinyInteger('type')->nullable();
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
