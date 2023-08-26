<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250)->nullable();
            $table->string('email', 500)->nullable();
            $table->string('subject', 200)->nullable();
            $table->string('phone', 15)->nullable();
            $table->text('message')->nullable();
            $table->text('reply')->nullable();
            $table->integer('status')->default(0);
            $table->dateTime('modify_date')->nullable();
            $table->timestamps();
        });

        Schema::create('contact_page', function (Blueprint $table) {
            $table->id();
            $table->string('name_th', 250)->nullable();
            $table->string('name_en', 250)->nullable();
            $table->text('office_th')->nullable();
            $table->text('office_en')->nullable();
            $table->string('phone', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('facebook', 200)->nullable();
            $table->string('youtube', 200)->nullable();
            $table->string('line', 200)->nullable();
            $table->string('tiktok', 200)->nullable();
            $table->string('ig', 200)->nullable();
            $table->text('gmaps')->nullable();
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
        Schema::dropIfExists('contact');
        Schema::dropIfExists('contact_page');
    }
}
