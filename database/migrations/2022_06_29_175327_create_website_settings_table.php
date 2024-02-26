<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('header_logo')->nullable();
            $table->string('header_slogan')->nullable();
            $table->string('footer_slogan')->nullable();
            $table->jsonb('logo')->nullable();
            $table->integer('logo_width')->nullable();
            $table->integer('logo_height')->nullable();
            $table->text('footer_fb_fan_page')->nullable();
            $table->string('customer_support_phone')->nullable();
            $table->text('contact_map')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_address')->nullable();
            $table->text('fb_chat')->nullable();
            $table->unsignedBigInteger('total_view')->default(0);
            $table->string('fb_comment_app_id')->nullable();
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
        Schema::dropIfExists('website_settings');
    }
}
