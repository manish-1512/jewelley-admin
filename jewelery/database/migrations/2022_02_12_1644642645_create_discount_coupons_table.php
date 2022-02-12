<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountCouponsTable extends Migration
{
    public function up()
    {
        Schema::create('discount_coupons', function (Blueprint $table) {

		$table->integer('id',11);
		$table->string('name');
		$table->string('coupon_code');
		$table->string('discount_type',100)->default('1');
		$table->integer('discount_value',11);
		$table->string('product_ids');
		$table->string('category_ids');
		$table->integer('min_order_value',11);
		$table->integer('max_discount_amount',11);
		$table->date('start_date_time')->nullable()->default('NULL');
		$table->date('end_date_time')->nullable()->default('NULL');
		$table->integer('is_active',11)->default('1');
		$table->integer('is_deleted',11)->default('0');
		$table->datetime('created_at')->default('current_timestamp');
		$table->datetime('updated_at');

        });
    }

    public function down()
    {
        Schema::dropIfExists('discount_coupons');
    }
}