<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websetting', function (Blueprint $table) {
            $table->id();
            $table->string('companyname_th', 250);
            $table->string('companyname_en', 250);
            $table->string('link_login', 200)->nullable();
            $table->string('logo_header', 200)->nullable();
            $table->string('logo_footer', 200)->nullable();
            $table->string('logo_favicon', 200)->nullable();
            $table->string('meta_title_th', 250)->nullable();
            $table->string('meta_title_en', 250)->nullable();
            $table->text('meta_keywords_th')->nullable();
            $table->text('meta_keywords_en')->nullable();
            $table->text('meta_description_th')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->string('seo_image', 250)->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
        Schema::create('tag_analytic', function (Blueprint $table) {
            $table->id();
            $table->string('type',250)->nullable();
            $table->text('head')->nullable();
            $table->text('body')->nullable();
            $table->text('footer')->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('websetting');
        Schema::dropIfExists('websetting_analytics');
    }
}
