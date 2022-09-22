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

            $table->foreignId('display_id')->constrained()
				->onDelete('cascade')
				->onUpdate('cascade');

            $table->foreignId('print_file_id')->constrained()
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
        Schema::dropIfExists('display_print_files');
    }
}
