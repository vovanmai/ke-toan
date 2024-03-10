<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_color', 25)->nullable();
            $table->jsonb('image');
            $table->boolean('active')->default(true);
            $table->string('short_description')->nullable();
            $table->string('short_description_color', 25)->nullable();
            $table->string('link')->nullable();
            $table->unsignedBigInteger('admin_id')->index()->nullable();
            $table->timestamps();

            $table->foreign('admin_id')
                ->references('id')
                ->on('admins')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_banners');
    }
}
