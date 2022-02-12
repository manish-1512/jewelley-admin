<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {

		$table->bigInteger('id',20)->unsigned();
		$table->bigInteger('user_id',20)->unsigned();
		$table->string('full_name');
		$table->string('email');
		$table->string('country',100);
		$table->string('state',100);
		$table->string('city',100);
		$table->string('pin_code',20);
		$table->text('address');
		$table->string('mobile_no',15);
		$table->string('town',100);
		$table->string('house_no',100)->nullable()->default('NULL');
		$table->string('colony',200)->nullable()->default('NULL');
		$table->string('landmark',200)->nullable()->default('NULL');
		$table->datetime('created_at');
		$table->datetime('updated_at');

        });
    }

    public function down()
    {
        Schema::dropIfExists('user_addresses');
    }
}