<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');

           // $table->unsignedBigInteger('order_id')->index();
           // $table->unsignedBigInteger('product_id')->index();
            $table->unsignedInteger('quantity');
            $table->decimal('price', 20, 6);

            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('product_id')->constrained('products');

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
        Schema::dropIfExists('order_items');
    }
}
