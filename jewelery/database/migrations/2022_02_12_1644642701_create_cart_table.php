<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {

		$table->bigInteger('id',20)->unsigned();
		$table->bigInteger('user_id',20)->unsigned();
		$table->bigInteger('product_id',20)->unsigned();
		$table->integer('quantity',11);
		$table->timestamp('created_at')->nullable()->default('NULL');
		$table->timestamp('updated_at')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('cart');
    }
}