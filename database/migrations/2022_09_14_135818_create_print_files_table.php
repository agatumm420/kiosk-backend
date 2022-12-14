<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrintFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->bigInteger('display_id');
            $table->foreignId('display_id')->constrained()
				->onDelete('cascade')
				->onUpdate('cascade');
            $table->string('file');
            $table->boolean('printed');
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
        Schema::dropIfExists('print_files');
    }
}
