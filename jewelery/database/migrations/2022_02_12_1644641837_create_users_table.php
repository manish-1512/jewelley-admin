<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

		$table->bigInteger('id',20)->unsigned();
		$table->string('first_name',40)->nullable()->default('NULL');
		$table->string('last_name',40)->nullable()->default('NULL');
		$table->string('mobile',15);
		$table->string('email')->nullable()->default('NULL');
		$table->enum('gender',['male','female','others'])->nullable()->default('NULL');
		$table->string('pincode',100)->nullable()->default('NULL');
		$table->string('country',100)->nullable()->default('NULL');
		$table->string('state',100)->nullable()->default('NULL');
		$table->string('city',100)->nullable()->default('NULL');
		$table->text('address')->nullable()->default('NULL');
		$table->string('image')->nullable()->default('NULL');
		$table->string('otp',10)->nullable()->default('NULL');
		$table->tinyInteger('is_verified',1)->nullable()->default('NULL');
		$table->tinyInteger('is_active',1)->nullable()->default('NULL');
		$table->datetime('created_at')->nullable()->default('NULL');
		$table->datetime('updated_at')->nullable()->default('NULL');
		$table->timestamp('otp_time')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}