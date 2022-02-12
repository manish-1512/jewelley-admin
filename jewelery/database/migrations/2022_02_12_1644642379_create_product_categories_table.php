<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {

		$table->integer('id',11);
		$table->string('name');
		$table->string('image',200)->nullable()->default('NULL');
		$table->integer('is_active',11)->default('1');
		$table->integer('is_deleted',11)->default('0');
		$table->datetime('created_at')->default('current_timestamp');
		$table->datetime('updated_at');

        });
    }

    public function down()
    {
        Schema::dropIfExists('product_categories');
    }
}