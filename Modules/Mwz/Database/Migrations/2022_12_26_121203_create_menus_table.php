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
            $table->integer('type')->nullable();
            $table->integer('status')->length(1);
            $table->timestamps();
        });
        
        Schema::create('admin_menus', function (Blueprint $table) {
            $table->id();
            $table->string('name_th', 500);
            $table->string('name_en', 500);
            $table->string('params', 700)->nullable();
            $table->integer('link_type')->nullable();
            $table->string('url',700)->nullable();
            $table->string('route_name',500)->nullable();
            $table->integer('permission_id')->nullable();
            $table->string('category_link',100)->nullable();
            $table->integer('location')->nullable();
            $table->string('image',700)->nullable();
            $table->string('icon',500)->nullable();
            $table->integer('sequence');
            NestedSet::columns($table);
            $table->integer('status')->length(1);
            $table->timestamps();
        });

        Schema::create('sms_otp', function (Blueprint $table) {
            $table->id();
            $table->string('otp', 500);
            $table->string('user_name', 500);
            $table->integer('status')->length(1);
            $table->string('response', 700);
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
        Schema::dropIfExists('admin_menus');
        Schema::dropIfExists('sms_otp');
    }
}
