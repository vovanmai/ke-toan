<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->index()->nullable();
            $table->jsonb('image');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('course_images');
    }
}
