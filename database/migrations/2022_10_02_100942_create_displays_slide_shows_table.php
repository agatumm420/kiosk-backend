<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisplaysSlideShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('displays_slide_shows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('slide_show_id')->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('display_id')->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('displays_slide_shows');
    }
}
