<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zongs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stuid')->nullable()->comment('学号');
            $table->string('stuname')->nullable()->comment('姓名');
            $table->string('fenshubigc')->nullable()->comment('分数最高课程名称');
            $table->string('fenshubig')->nullable()->comment('分数最高');
            $table->string('kemushu')->nullable()->comment('总科目数');
            $table->string('gkemushu')->nullable()->comment('总挂科数');
            $table->string('credits')->nullable()->comment('总学分');
            $table->string('pjpoints')->nullable()->comment('平均绩点');
            $table->string('njbigpaim')->nullable()->comment('年级最高排名');

            $table->string('zaixpj')->nullable()->comment('在校平均成绩');
            $table->string('chaoyrs')->nullable()->comment('超越全年级人数');
            $table->string('fivesix')->nullable()->comment('50-60');
            $table->string('sixseven')->nullable()->comment('60-75');
            $table->string('sevennine')->nullable()->comment('75-90');
            $table->string('ninehunder')->nullable()->comment('90-100');

            $table->string('yishight')->nullable()->comment('201320141最高');
            $table->string('yislow')->nullable()->comment('201320141最低');
            $table->string('yispjf')->nullable()->default(0)->comment('201320141平均分');
            $table->string('yisbjpm')->nullable()->default(0)->comment('201320141班级排名');

            $table->string('yixhight')->nullable()->comment('201320142最高');
            $table->string('yixlow')->nullable()->comment('201320142最低');
            $table->string('yixpjf')->nullable()->default(0)->comment('201320142平均分');
            $table->string('yixbjpm')->nullable()->default(0)->comment('201320142班级排名');

            $table->string('ershight')->nullable()->comment('201420151最高');
            $table->string('erslow')->nullable()->comment('201420151最低');
            $table->string('erspjf')->nullable()->default(0)->comment('201420151平均分');
            $table->string('ersbjpm')->nullable()->default(0)->comment('201420151班级排名');

            $table->string('erxhight')->nullable()->comment('201420152最高');
            $table->string('erxlow')->nullable()->comment('201420152最低');
            $table->string('erxpjf')->nullable()->default(0)->comment('201420152平均分');
            $table->string('erxbjpm')->nullable()->default(0)->comment('201420152班级排名');

            $table->string('sanshight')->nullable()->comment('201520161最高');
            $table->string('sanslow')->nullable()->comment('201520161最低');
            $table->string('sanspjf')->nullable()->default(0)->comment('201520161平均分');
            $table->string('sansbjpm')->nullable()->default(0)->comment('201520161班级排名');

            $table->string('sanxhight')->nullable()->comment('201520162最高');
            $table->string('sanxlow')->nullable()->comment('201520162最低');
            $table->string('sanxpjf')->nullable()->default(0)->comment('201520162平均分');
            $table->string('sanxbjpm')->nullable()->default(0)->comment('201520162班级排名');

            $table->string('faculty')->nullable()->comment('学院');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zongs');
    }
}
