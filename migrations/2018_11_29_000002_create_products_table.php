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
            $table->string('name', 64)->nullable();
            $table->string('code', 64)->nullable();
            $table->string('description', 1024)->nullable();
            $table->string('narration', 800)->nullable();
            $table->string('narration2', 800)->nullable();
            $table->string('narration3', 800)->nullable();
            $table->string('narration4', 800)->nullable();
            $table->string('narration5', 800)->nullable();
            $table->string('narration6', 800)->nullable();
            $table->string('narration7', 800)->nullable();
            $table->string('narration8', 800)->nullable();
            $table->string('narration9', 800)->nullable();
            $table->string('narration10', 800)->nullable();
            $table->string('refno', 60)->nullable();
            $table->string('ref2no', 60)->nullable();
            $table->enum('itemserial', ['Yes','No'])->default('No');
            $table->enum('type', ['Public','Protected','System'])->default('Public');
            $table->unsignedInteger('category_01')->nullable()->index();
            $table->unsignedInteger('category_02')->nullable()->index();
            $table->unsignedInteger('category_03')->nullable()->index();
            $table->unsignedInteger('category_04')->nullable()->index();
            $table->unsignedInteger('category_05')->nullable()->index();
            $table->unsignedInteger('category_06')->nullable()->index();
            $table->unsignedInteger('category_07')->nullable()->index();
            $table->unsignedInteger('category_08')->nullable()->index();
            $table->unsignedInteger('category_09')->nullable()->index();
            $table->unsignedInteger('category_10')->nullable()->index();
            $table->enum('status', ['Active','Inactive'])->default('Active')->index();
            $table->timestamps();
            $table->foreign('category_01')->references('id')->on('item_group_master')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('category_02')->references('id')->on('item_group_master')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('category_03')->references('id')->on('item_group_master')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('category_04')->references('id')->on('item_group_master')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('category_05')->references('id')->on('item_group_master')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('category_06')->references('id')->on('item_group_master')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('category_07')->references('id')->on('item_group_master')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('category_08')->references('id')->on('item_group_master')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('category_09')->references('id')->on('item_group_master')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('category_10')->references('id')->on('item_group_master')->onUpdate('cascade')->onDelete('set null');
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
