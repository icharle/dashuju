<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qiches', function (Blueprint $table) {
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

            $table->string('yishight')->nullable()->comment('201320141最高');
            $table->string('yislow')->nullable()->comment('201320141最低');
            $table->string('yiszongfen')->nullable()->comment('201320141总分');
            $table->string('yiszongke')->nullable()->comment('201320141总科目数');

            $table->string('yixhight')->nullable()->comment('201320142最高');
            $table->string('yixlow')->nullable()->comment('201320142最低');
            $table->string('yixzongfen')->nullable()->comment('201320142总分');
            $table->string('yixzongke')->nullable()->comment('201320142总科目数');

            $table->string('ershight')->nullable()->comment('201420151最高');
            $table->string('erslow')->nullable()->comment('201420151最低');
            $table->string('erszongfen')->nullable()->comment('201420151总分');
            $table->string('erszongke')->nullable()->comment('201420151总科目数');

            $table->string('erxhight')->nullable()->comment('201420152最高');
            $table->string('erxlow')->nullable()->comment('201420152最低');
            $table->string('erxzongfen')->nullable()->comment('201420152总分');
            $table->string('erxzongke')->nullable()->comment('201420152总科目数');

            $table->string('sanshight')->nullable()->comment('201520161最高');
            $table->string('sanslow')->nullable()->comment('201520161最低');
            $table->string('sanszongfen')->nullable()->comment('201520161总分');
            $table->string('sanszongke')->nullable()->comment('201520161总科目数');

            $table->string('sanxhight')->nullable()->comment('201520162最高');
            $table->string('sanxlow')->nullable()->comment('201520162最低');
            $table->string('sanxzongfen')->nullable()->comment('201520162总分');
            $table->string('sanxzongke')->nullable()->comment('201520162总科目数');

            $table->string('sishight')->nullable()->comment('201620171最高');
            $table->string('sislow')->nullable()->comment('201620171最低');
            $table->string('siszongfen')->nullable()->comment('201620171总分');
            $table->string('siszongke')->nullable()->comment('201620171总科目数');

            $table->string('sixhight')->nullable()->comment('201620172最高');
            $table->string('sixlow')->nullable()->comment('201620172最低');
            $table->string('sixzongfen')->nullable()->comment('201620172总分');
            $table->string('sixzongke')->nullable()->comment('201620172总科目数');

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
        Schema::dropIfExists('qiches');
    }
}
