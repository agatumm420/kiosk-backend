<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisplayPrintFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('display_print_file', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('display_id');
            $table->foreign('display_id')
              ->references('id')
              ->on('displays')->onDelete('cascade');
            $table->bigInteger('print_file_id');
            $table->foreign('print_file_id')
              ->references('id')
              ->on('print_files')->onDelete('cascade');
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
        Schema::dropIfExists('display_print_files');
    }
}
