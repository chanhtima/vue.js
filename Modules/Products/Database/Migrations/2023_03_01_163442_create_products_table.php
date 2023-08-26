<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id')->index();
            $table->string('code', 20)->nullable();
            $table->string('name_th', 700)->nullable();
            $table->string('description_th', 700)->nullable();
            $table->text('detail_th')->nullable();
            $table->string('name_en', 700)->nullable();
            $table->string('description_en', 700)->nullable();
            $table->text('detail_en')->nullable();
            $table->text('images')->nullable();
            $table->string('link',700)->nullable();
            $table->string('related_product',700)->nullable();
            $table->text('param')->nullable();
            $table->integer('sort')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('status_footer')->default(0);
            $table->boolean('index_status')->default(0);
            $table->boolean('delete_status')->default(0);
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
        Schema::dropIfExists('products');
    }
}
