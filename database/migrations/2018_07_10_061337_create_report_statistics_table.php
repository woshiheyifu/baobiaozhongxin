<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_id')->default(0)->comment('报表id')->unique();
            $table->integer('views')->default(0)->comment('访问量');
            $table->integer('download')->default(0)->comment('下载量');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_statistics');
    }
}
