<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->id();
            $table->string("type",20)->nullable();
            $table->string("name_th",700)->nullable();
            $table->string("name_en",700)->nullable();
            $table->string("desc_th",700)->nullable();
            $table->string("desc_en",700)->nullable();
            $table->text("detail_th")->nullable();
            $table->text("detail_en")->nullable();
            $table->string("image",700)->nullable();
            $table->integer("params")->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('status_index')->default(0);
            $table->integer('sequence')->comment = 'ลำดับในการแสดงผล';
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
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
        Schema::dropIfExists('content');
    }
}
