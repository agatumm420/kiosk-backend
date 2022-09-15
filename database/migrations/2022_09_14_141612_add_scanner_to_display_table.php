<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddScannerToDisplayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('displays', function (Blueprint $table) {
            $table->bigInteger('slide_show_id')->nullable();
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
        Schema::table('display', function (Blueprint $table) {
            //
        });
    }
}
