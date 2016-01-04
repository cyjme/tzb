<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdfworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdfwork', function (Blueprint $table) {
            $table->increments('id');
            $table->string('work_id');
            $table->string('name');
            $table->string('big_class');
            $table->string('small_class');
            $table->string('people');
            $table->string('school');
            $table->string('aim');
            $table->string('brief');
            $table->string('detailed');
            $table->string('document_name');
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
        Schema::drop('pdfwork');
    }
}
