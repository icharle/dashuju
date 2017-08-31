<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJixiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jixies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stuid')->nullable()->comment('学号');
            $table->string('stuname')->nullable()->comment('姓名');
            $table->string('fenshubigc')->nullable()->comment('分数最高课程名称');
            $table->string('fenshubig')->nullable()->comment('分数最高');
            $table->string('kemushu')->nullable()->comment('总科目数');
            $table->string('gkemushu')->nullable()->comment('总挂科数');
            $table->string('credits')->nullable()->comment('总学分');

            $table->string('points')->nullable()->comment('总绩点(除去通选课)');
            $table->string('fcredits')->nullable()->comment('总学分(除去通选课)');
            $table->string('pjpoints')->nullable()->comment('平均绩点');

            $table->string('yishight')->nullable()->comment('201320141最高');
            $table->string('yislow')->nullable()->comment('201320141最低');
            $table->string('yiszongfen')->nullable()->comment('201320141总分');
            $table->string('yiszongke')->nullable()->comment('201320141总科目数');
            $table->string('yispjf')->nullable()->default(0)->comment('201320141平均分');
            $table->string('yisbjpm')->nullable()->default(0)->comment('201320141班级排名');
            $table->string('yisnjpm')->nullable()->default(0)->comment('201320141年级排名');

            $table->string('yixhight')->nullable()->comment('201320142最高');
            $table->string('yixlow')->nullable()->comment('201320142最低');
            $table->string('yixzongfen')->nullable()->comment('201320142总分');
            $table->string('yixzongke')->nullable()->comment('201320142总科目数');
            $table->string('yixpjf')->nullable()->default(0)->comment('201320142平均分');
            $table->string('yixbjpm')->nullable()->default(0)->comment('201320142班级排名');
            $table->string('yixnjpm')->nullable()->default(0)->comment('201320142年级排名');

            $table->string('ershight')->nullable()->comment('201420151最高');
            $table->string('erslow')->nullable()->comment('201420151最低');
            $table->string('erszongfen')->nullable()->comment('201420151总分');
            $table->string('erszongke')->nullable()->comment('201420151总科目数');
            $table->string('erspjf')->nullable()->default(0)->comment('201420151平均分');
            $table->string('ersbjpm')->nullable()->default(0)->comment('201420151班级排名');
            $table->string('ersnjpm')->nullable()->default(0)->comment('201420151年级排名');

            $table->string('erxhight')->nullable()->comment('201420152最高');
            $table->string('erxlow')->nullable()->comment('201420152最低');
            $table->string('erxzongfen')->nullable()->comment('201420152总分');
            $table->string('erxzongke')->nullable()->comment('201420152总科目数');
            $table->string('erxpjf')->nullable()->default(0)->comment('201420152平均分');
            $table->string('erxbjpm')->nullable()->default(0)->comment('201420152班级排名');
            $table->string('erxnjpm')->nullable()->default(0)->comment('201420152年级排名');

            $table->string('sanshight')->nullable()->comment('201520161最高');
            $table->string('sanslow')->nullable()->comment('201520161最低');
            $table->string('sanszongfen')->nullable()->comment('201520161总分');
            $table->string('sanszongke')->nullable()->comment('201520161总科目数');
            $table->string('sanspjf')->nullable()->default(0)->comment('201520161平均分');
            $table->string('sansbjpm')->nullable()->default(0)->comment('201520161班级排名');
            $table->string('sansnjpm')->nullable()->default(0)->comment('201520161年级排名');

            $table->string('sanxhight')->nullable()->comment('201520162最高');
            $table->string('sanxlow')->nullable()->comment('201520162最低');
            $table->string('sanxzongfen')->nullable()->comment('201520162总分');
            $table->string('sanxzongke')->nullable()->comment('201520162总科目数');
            $table->string('sanxpjf')->nullable()->default(0)->comment('201520162平均分');
            $table->string('sanxbjpm')->nullable()->default(0)->comment('201520162班级排名');
            $table->string('sanxnjpm')->nullable()->default(0)->comment('201520162年级排名');

            $table->string('sishight')->nullable()->comment('201620171最高');
            $table->string('sislow')->nullable()->comment('201620171最低');
            $table->string('siszongfen')->nullable()->comment('201620171总分');
            $table->string('siszongke')->nullable()->comment('201620171总科目数');
            $table->string('sispjf')->nullable()->default(0)->comment('201620171平均分');
            $table->string('sisbjpm')->nullable()->default(0)->comment('201620171班级排名');
            $table->string('sisnjpm')->nullable()->default(0)->comment('201620171年级排名');

            $table->string('sixhight')->nullable()->comment('201620172最高');
            $table->string('sixlow')->nullable()->comment('201620172最低');
            $table->string('sixzongfen')->nullable()->comment('201620172总分');
            $table->string('sixzongke')->nullable()->comment('201620172总科目数');
            $table->string('sixpjf')->nullable()->default(0)->comment('201620172平均分');
            $table->string('sixbjpm')->nullable()->default(0)->comment('201620172班级排名');
            $table->string('sixnjpm')->nullable()->default(0)->comment('201620172年级排名');

            $table->string('faculty')->nullable()->comment('专业');
            $table->string('class')->nullable()->comment('班级');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jixies');
    }
}
