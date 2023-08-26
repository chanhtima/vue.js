<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('name_th', 500);
            $table->string('name_en', 500);
            $table->string('slug_th', 500)->nullable();
            $table->string('slug_en', 500)->nullable();
            $table->string('params', 700)->nullable();
            $table->integer('sequence');
            NestedSet::columns($table);
            $table->string('type')->nullable();
            $table->integer('link_type')->nullable();
            $table->integer('slug_id')->nullable();
            $table->string('show_location')->nullable();
            $table->string('url')->nullable();
            $table->integer('status')->length(1);
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
        Schema::dropIfExists('menu');
    }
}
