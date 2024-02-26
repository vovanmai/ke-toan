<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->index()->nullable();
            $table->string('title');
            $table->text('content')->nullable();
            $table->date('start_date');
            $table->string('start_time', 5);
            $table->date('end_date')->nullable();
            $table->string('end_time', 5)->nullable();
            $table->boolean('is_all_day');
            $table->boolean('is_recurrent');
            $table->string('color', 50);
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
        Schema::dropIfExists('events');
    }
}
