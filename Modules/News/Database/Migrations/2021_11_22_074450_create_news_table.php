<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('name_th', 500);
            $table->string('name_en', 500);
            $table->text('description_th');
            $table->text('description_en');
            $table->string('slug_th', 255)->nullable();
            $table->string('slug_en', 255)->nullable();
            $table->string('image', 700);
            $table->string('params', 700)->nullable();
            $table->boolean('status')->default(0);
            $table->integer('sequence');
            $table->integer('id_news_category');
            $table->integer('author')->nullable()->comment = 'ผู้เขียน';
            $table->dateTime('publish_at')->comment = 'วันที่กำหนดให้เผยแพร่';
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
        Schema::dropIfExists('news');
    }
}
