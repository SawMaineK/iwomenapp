<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubResourceDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SubResourceDetial', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objectId');
            $table->string('authorName');
            $table->string('author_id');
            $table->string('author_img_url');
            $table->string('author_relation');
            $table->boolean('isAllow');
            $table->string('posted_date');
            $table->string('resource_id');
            $table->string('sub_res_icon_img_url');
            $table->string('sub_resource_content_eng');
            $table->string('sub_resource_content_mm');
            $table->string('sub_resource_title_eng');
            $table->string('sub_resource_title_mm');
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
        Schema::drop('SubResourceDetial');
    }
}
