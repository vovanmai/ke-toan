<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->index();
            $table->unsignedBigInteger('admin_id')->index()->nullable();
            $table->string('title')->index();
            $table->string('slug')->unique();
            $table->string('short_description', 1000);
            $table->boolean('active')->default(true);
            $table->boolean('is_free')->default(false);
            $table->unsignedBigInteger('price')->nullable();
            $table->tinyInteger('comment_type')->default(COMMENT_NORMAL);
            $table->jsonb('preview_file')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('total_view')->default(0);
            $table->unsignedBigInteger('total_download')->default(0);
            $table->integer('total_page')->nullable();
            $table->jsonb('file');
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
        Schema::dropIfExists('documents');
    }
}
