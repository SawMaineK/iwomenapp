<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TlgProfile extends Model
{
    //
    protected $table = 'tlgprofile';
    protected $fillable = [	
				    		'objectId',
				            'tlg_group_address',
				            'tlg_group_address_mm',
				            'tlg_group_key_activity',
				            'tlg_group_key_activity_mm',
				            'tlg_group_key_skills',
				            'tlg_group_key_skills_mm',
				            'tlg_group_lat_address',
				            'tlg_group_lng_address',
				            'tlg_group_logo',
				            'tlg_group_member_no',
				            'tlg_group_name',
				            'tlg_group_name_mm',
				            'tlg_group_other_member_no',
				            'tlg_leader_fb_link',
				            'tlg_leader_img',
				            'tlg_leader_name',
				            'tlg_leader_name_mm',
				            'tlg_leader_ph',
				            'tlg_leader_role',
				            'tlg_member_ph',
				            'tlg_member_ph_no'
				        ];
}
