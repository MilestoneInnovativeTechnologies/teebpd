<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishlistProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlist_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('wishlist')->nullable()->index();
            $table->unsignedInteger('product')->nullable()->index();
            $table->unsignedInteger('added_by')->nullable()->index();
            $table->timestamp('added_on')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('removed_by')->nullable()->index();
            $table->timestamp('removed_on')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->enum('product_status', ['Active','Inactive'])->default('Active')->index();
            $table->enum('status', ['Active','Inactive'])->default('Active')->index();
            $table->timestamps();
            $table->foreign('wishlist')->references('id')->on('wishlists')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('added_by')->references('id')->on('visitors')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('removed_by')->references('id')->on('visitors')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wishlist_products');
    }
}
