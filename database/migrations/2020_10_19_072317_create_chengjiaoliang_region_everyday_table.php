<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChengjiaoliangRegionEverydayTable extends Migration
{
    /**
     * 每日成交->分区域
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chengjiaoliang_region_everyday', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->tinyInteger('type')->default(0)->comment('类型: 0新房, 1存量房');
            $table->char('district',20)->default('')->comment('区域,如青秀区等');
            $table->integer('number')->default(0)->comment('数量');
            $table->integer('total_area')->default(0)->comment('面积');

            $table->timestamp('day')->nullable()->comment('日期');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chengjiaoliang_area_everyday');
    }
}
