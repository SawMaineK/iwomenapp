<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTlgProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TlgProfile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objectId');
            $table->string('tlg_group_address');
            $table->string('tlg_group_address_mm');
            $table->string('tlg_group_key_activity');
            $table->string('tlg_group_key_activity_mm');
            $table->string('tlg_group_key_skills');
            $table->string('tlg_group_key_skills_mm');
            $table->string('tlg_group_lat_address');
            $table->string('tlg_group_lng_address');
            $table->string('tlg_group_logo');
            $table->string('tlg_group_member_no');
            $table->string('tlg_group_name');
            $table->string('tlg_group_name_mm');
            $table->string('tlg_group_other_member_no');
            $table->string('tlg_leader_fb_link');
            $table->string('tlg_leader_img');
            $table->string('tlg_leader_name');
            $table->string('tlg_leader_name_mm');
            $table->string('tlg_leader_ph');
            $table->string('tlg_leader_role');
            $table->string('tlg_member_ph');
            $table->string('tlg_member_ph_no');
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
        Schema::drop('TlgProfile');
    }
}
