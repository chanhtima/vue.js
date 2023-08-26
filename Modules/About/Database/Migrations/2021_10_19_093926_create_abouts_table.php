<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('abouts', function (Blueprint $table) {
          $table->id();
          $table->string('name_th',500);
          $table->string('name_en',500);
          $table->text('description_th')->nullable();
          $table->text('description_en')->nullable();
          $table->boolean('status')->default(0);
          $table->timestamps();
      });

      Schema::create('about_detail', function (Blueprint $table) {
        $table->id();
        $table->string('image',700)->nullable();
        $table->text('detail_th')->nullable();
        $table->text('detail_en')->nullable();
        $table->boolean('status')->default(0);
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
        Schema::dropIfExists('abouts');
        Schema::dropIfExists('about_detail');
    }
}
