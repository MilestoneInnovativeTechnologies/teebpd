<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 64)->index();
			$table->unsignedInteger('product')->nullable()->index();
			$table->string('image', 128)->nullable();
			$table->enum('default', ['Yes','No'])->default('Yes')->index();
			$table->enum('status', ['Active','Inactive'])->default('Active')->index();
			$table->timestamps();
			$table->foreign('product')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_images');
    }
}
