<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerImagesTable extends Migration
{
    public function up()
    {
        Schema::create('banner_images', function (Blueprint $table) {

		$table->tinyInteger('id',4);
		$table->string('image',200);
		$table->string('name',200);
		$table->tinyInteger('is_active',1);
		$table->integer('order_by',11);
		$table->timestamp('created_at')->nullable()->default('NULL');
		$table->timestamp('updated_at')->nullable()->default('NULL');

        });
    }

    public function down()
    {
        Schema::dropIfExists('banner_images');
    }
}