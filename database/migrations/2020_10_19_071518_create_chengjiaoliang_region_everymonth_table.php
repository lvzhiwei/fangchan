<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChengjiaoliangRegionEveryMonthTable extends Migration
{
    /**
     * 城市每日成交量表
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chengjiaoliang_region_everymonty', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyInteger('type')->default(0)->comment('类型: 0新房, 1二手房');
            $table->char('district',20)->default('')->comment('区域,如青秀区等');
            $table->tinyInteger('house_type')->default(0)->comment('房产类型: 0所有, 1商品房');
            $table->integer('number')->default(0)->comment('数量');
            $table->integer('total_area')->default(0)->comment('面积');

            $table->integer('year')->comment('日期:年');
            $table->integer('month')->comment('日期:月');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chengjiaoliang');
    }
}
