<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

		$table->bigInteger('id',20)->unsigned();
		$table->string('order_id',100);
		$table->bigInteger('address_id',20)->unsigned();
		$table->bigInteger('user_id',20)->unsigned();
		$table->decimal('total_payment',10,0);
		$table->string('payment_id',100);
		$table->string('status',100);
		$table->timestamp('created_at')->nullable()->default('NULL');
		$table->timestamp('updated_at')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}