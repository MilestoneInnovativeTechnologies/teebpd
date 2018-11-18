<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 64)->index();
			$table->string('description', 1024)->nullable();
			$table->unsignedInteger('brand')->nullable()->index();
			$table->unsignedInteger('category')->nullable()->index();
			$table->string('no', 32)->nullable();
			$table->string('code', 64)->nullable();
			$table->string('size', 32)->nullable();
			$table->string('stock', 32)->nullable();
			$table->enum('type', ['Public','Private'])->default('Public')->index();
			$table->string('detail1', 256)->nullable();
			$table->string('detail2', 256)->nullable();
			$table->string('detail3', 256)->nullable();
			$table->string('detail4', 256)->nullable();
			$table->string('detail5', 256)->nullable();
			$table->enum('status', ['Active','Inactive'])->default('Active')->index();
			$table->timestamps();
			$table->foreign('brand')->references('id')->on('brands')->onUpdate('cascade')->onDelete('set null');
			$table->foreign('category')->references('id')->on('categories')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
