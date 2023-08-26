<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;

class CreateBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->integer("category_id")->nullable();
            $table->string('name_th', 500);
            $table->string('name_en', 500);
            $table->text('url_video')->nullable();
            $table->string('image', 700)->nullable();
            $table->text('link')->nullable();
            $table->text('link_target')->nullable();
            $table->integer("type")->nullable();
            $table->integer("locatioin")->nullable();
            $table->integer('sequence')->comment = 'ลำดับในการแสดงผล';
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
        Schema::create('banner_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_th', 500);
            $table->string('name_en', 500);
            $table->boolean('status')->default(0);
            $table->integer('sequence')->comment = 'ลำดับในการแสดงผล';
            NestedSet::columns($table);
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
        Schema::dropIfExists('banners');
        Schema::dropIfExists('banner_categories');
    }
}
