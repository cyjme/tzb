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
            $table->string('user_id');//�û�id
            $table->string('name');//��Ʒ����
            $table->string('big_class');//����
            $table->string('small_class');//С��
            $table->string('aim');//Ŀ��
            $table->string('brief');//���200��֮��
            $table->string('detailed');//��ϸ����1000������
            $table->string('document_address');//�����ĵ���ַ
            $table->string('materials_address');//���Ӳ��ϵ�ַ
            $table->string('image_address');//��ƷͼƬ��ַ
            $table->string('video_address');//��Ʒ��Ƶ��ַ
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
