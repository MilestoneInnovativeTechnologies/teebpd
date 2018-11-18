<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_wishlists', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('visitor')->nullable()->index();
			$table->unsignedInteger('wishlist')->nullable()->index();
			$table->enum('viewed', ['Yes','No'])->default('No')->index();
			$table->enum('status', ['Active','Inactive'])->default('Active')->index();
			$table->timestamps();
			$table->foreign('visitor')->references('id')->on('visitors')->onUpdate('cascade')->onDelete('set null');
			$table->foreign('wishlist')->references('id')->on('wishlists')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitor_wishlists');
    }
}
