<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('title')->comment('标题')->default('');
            $table->text('description')->nullable()->comment('描述');
            $table->string('file_url')->comment('文件路径')->default('');
            $table->string('img_url')->comment('图片路径')->default('');
            $table->string('thumbnail_url')->comment('缩略图路径')->default('');
            $table->integer('category_id')->comment('类型id')->default(0);
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
        Schema::dropIfExists('reports');
    }
}
