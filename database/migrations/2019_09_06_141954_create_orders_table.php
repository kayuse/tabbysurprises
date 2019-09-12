<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('celebrant_name')->nullable(false);
            $table->integer('celebration_address')->nullable(false);
            $table->string('celebration_type')->nullable(false);
            $table->dateTime('celebration_time')->nullable(false);
            $table->text('other')->nullable(true);
            $table->integer('amount')->nullable(true);
            $table->smallInteger('is_confirmed');
            $table->smallInteger('payment_status');
            $table->integer('client_id')->nullable(false);
            $table->smallInteger('is_attended')->default(false);
            $table->timestamps();
        });
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });
        Schema::create('order_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('service_id');
            $table->integer('order_id');
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
        Schema::dropIfExists('services');
        Schema::dropIfExists('order_services');

    }
}
