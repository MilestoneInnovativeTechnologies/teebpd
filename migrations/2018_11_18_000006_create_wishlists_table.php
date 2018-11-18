<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 64)->index();
			$table->string('description', 1024)->nullable();
			$table->unsignedInteger('author')->nullable()->index();
			$table->enum('status', ['Active','Inactive'])->default('Active')->index();
			$table->timestamps();
			$table->foreign('author')->references('id')->on('visitors')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wishlists');
    }
}
