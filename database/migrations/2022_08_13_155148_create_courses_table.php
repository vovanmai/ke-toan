<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_description', 1000);
            $table->jsonb('image')->nullable();
            $table->tinyInteger('comment_type')->default(COMMENT_NORMAL);
            $table->text('description');
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('admin_id')->index()->nullable();
            $table->unsignedBigInteger('total_view')->default(0);
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
        Schema::dropIfExists('courses');
    }
}
