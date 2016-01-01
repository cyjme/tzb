<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('work', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');//用户id
            $table->string('name');//作品名称
            $table->string('big_class');//大类
            $table->string('small_class');//小类
            $table->string('aim');//目的
            $table->string('brief');//简介200字之内
            $table->string('detailed');//详细介绍1000字以内
            $table->string('document_address');//论文文档地址
            $table->string('materials_address');//附加材料地址
            $table->string('image_address');//作品图片地址
            $table->string('video_address');//作品视频地址
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
        //
    }
}
