<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_power', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            //判断用户是否为管理员的字段
            $table->string('is_admin');
            //管理员所在学校
            $table->string('school');
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
        Schema::drop('user_power');
    }
}
