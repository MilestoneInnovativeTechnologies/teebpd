<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishlistNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlist_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('wishlist')->nullable()->index();
            $table->string('note', 512)->nullable();
            $table->unsignedInteger('author')->nullable()->index();
            $table->enum('status', ['Active','Inactive'])->default('Active')->index();
            $table->timestamps();
            $table->foreign('wishlist')->references('id')->on('wishlists')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('wishlist_notes');
    }
}
