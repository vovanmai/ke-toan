<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->index();
            $table->unsignedBigInteger('admin_id')->index()->nullable();
            $table->string('title')->index();
            $table->string('short_description', 1000);
            $table->boolean('active')->default(true);
            $table->boolean('is_show_home')->default(false);
            $table->tinyInteger('comment_type')->default(COMMENT_NORMAL);
            $table->jsonb('image');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('total_view')->default(0);
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete();

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
        Schema::dropIfExists('posts');
    }
}
