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
            $table->string('company_name')->nullable();
            $table->string('company_tax_code', 20)->nullable();
            $table->string('hotline')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_website_domain')->nullable();
            $table->string('link_fan_page_facebook')->nullable();
            $table->jsonb('header_banner')->nullable();
            $table->string('header_banner_width', 10)->nullable();
            $table->string('header_banner_height', 10)->nullable();
            $table->text('fb_fan_page_script')->nullable();
            $table->text('google_map_address_company')->nullable();
            $table->unsignedBigInteger('total_view')->default(0);
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
