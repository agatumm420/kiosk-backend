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

            $table->foreignId('screen_saver_id')->constrained()
				->onDelete('cascade')
				->onUpdate('cascade');

            $table->foreignId('slide_show_id')->constrained()
				->onDelete('cascade')
				->onUpdate('cascade');
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
