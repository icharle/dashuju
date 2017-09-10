<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXiaofsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xiaofs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stuid')->nullable()->comment('学号');
            $table->string('stuname')->nullable()->comment('姓名');
            $table->string('daytime')->nullable()->comment('饭卡消费的天数');
            $table->string('count')->nullable()->comment('在校总消费');
            $table->string('chaoyuebaif')->nullable()->comment('超越全校人数');
            $table->string('hight')->nullable()->comment('单日最高');
            $table->string('low')->nullable()->comment('单日最低');
            $table->string('libtime')->nullable()->comment('进入图书馆次数');
            $table->string('libchaoyuebaif')->nullable()->comment('超越全校人数');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xiaofs');
    }
}
