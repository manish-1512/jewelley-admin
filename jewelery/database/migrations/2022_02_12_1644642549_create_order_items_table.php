<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {

		$table->bigInteger('id',20);
		$table->bigInteger('order_id',20)->unsigned();
		$table->bigInteger('product_id',20)->unsigned();
		$table->integer('quantity',11);
		$table->float('price');
		$table->datetime('created_at')->nullable()->default('NULL');
		$table->timestamp('updated_at')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}