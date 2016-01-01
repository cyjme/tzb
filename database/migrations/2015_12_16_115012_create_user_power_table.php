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
            //�ж��û��Ƿ�Ϊ����Ա���ֶ�
            $table->string('is_admin');
            //����Ա����ѧУ
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
