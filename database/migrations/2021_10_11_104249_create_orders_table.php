<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('code', 20)->index()->nullable();
            $table->unsignedTinyInteger('status')->index();
            $table->unsignedTinyInteger('payment_method');
            $table->unsignedBigInteger('sub_total');
            $table->unsignedSmallInteger('tax')->default(0);
            $table->unsignedInteger('ship_fee')->default(0);
            $table->unsignedBigInteger('total');
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('ship_address', 500)->nullable();
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
