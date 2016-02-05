<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStickerStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('StickerStore', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objectId');
            $table->string('stickerImg');
            $table->string('stickerImgPath');
            $table->string('stickerName');
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
        Schema::drop('StickerStore');
    }
}
