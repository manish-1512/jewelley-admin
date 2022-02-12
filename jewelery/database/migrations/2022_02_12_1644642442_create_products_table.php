<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

		$table->bigInteger('id',20)->unsigned();
		$table->string('title');
		;
		;
		$table->text('description');
		$table->float('price');
		$table->float('weight');
		$table->integer('discount',11);
		$table->string('product_category',100);
		$table->string('product_type');
		$table->enum('product_matrial',['gold','silver','platinum','Titanium','base_metals','stainless_steel','pearl']);
		$table->tinyInteger('is_active',1);
		$table->tinyInteger('is_new',1);
		$table->tinyInteger('is_popular',1);
		$table->tinyInteger('is_best_seller',1);
		$table->timestamp('created_at')->nullable()->default('NULL');
		$table->timestamp('updated_at')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}