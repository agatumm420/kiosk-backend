<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlideShowScreenSaverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide_show_screen_saver', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('screen_saver_id');
            $table->foreign('screen_saver_id')
              ->references('id')
              ->on('screen_savers')->onDelete('cascade');
            $table->bigInteger('slide_show_id');
            $table->foreign('slide_show_id')
              ->references('id')
              ->on('slide_shows')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slide_show_screen_saver');
    }
}
