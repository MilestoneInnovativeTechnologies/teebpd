<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_wishlists', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('wishlist')->nullable()->index();
            $table->enum('status', ['Active','Inactive'])->default('Active')->index();
            $table->enum('viewed', ['Yes','No'])->default('No')->index();
            $table->timestamps();
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
        Schema::dropIfExists('vendor_wishlists');
    }
}
