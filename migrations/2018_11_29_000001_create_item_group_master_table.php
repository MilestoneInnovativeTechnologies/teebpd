<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemGroupMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_group_master', function (Blueprint $table) {
            $table->increments('id');
            $table->string('refno', 60)->nullable();
            $table->string('catecode', 16)->nullable();
            $table->string('gcode', 16)->nullable();
            $table->string('name', 64)->index();
            $table->enum('list', ['Yes','No'])->default('Yes');
            $table->enum('type', ['Public','Private'])->default('Public')->index();
            $table->enum('status', ['Active','Inactive'])->default('Active')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_group_master');
    }
}
