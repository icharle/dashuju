<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stuid')->nullable()->comment('学号');
            $table->string('stuname')->nullable()->comment('姓名');
            $table->string('money')->nullable()->comment('总消费');
            $table->string('monpercent')->nullable()->comment('消费百分比');
            $table->string('monmin')->nullable()->comment('单日最低消费');
            $table->string('monmax')->nullable()->comment('单日最高消费');
            $table->string('libtime')->nullable()->comment('进入图书馆次数');
            $table->string('libpercent')->nullable()->comment('图书馆百分比');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('students');


    }
}
