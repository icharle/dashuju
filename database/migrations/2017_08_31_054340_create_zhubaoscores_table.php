<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZhubaoscoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zhubaoscores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stuid')->nullable()->comment('学号');
            $table->string('stuname')->nullable()->comment('姓名');
            $table->string('coursetitle')->nullable()->comment('课程名称');
            $table->string('credit')->nullable()->comment('学分');
            $table->string('results')->nullable()->comment('成绩');
            $table->string('point')->nullable()->comment('绩点');
            $table->string('coursexzhi')->nullable()->comment('课程性质');
            $table->string('schoolyear')->nullable()->comment('学年');
            $table->string('semester')->nullable()->comment('学期');
            $table->string('faculty')->nullable()->comment('学院');
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
        Schema::dropIfExists('zhubaoscores');
    }
}
