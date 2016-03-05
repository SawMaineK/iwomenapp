<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TlgProfile extends Model
{
    use SoftDeletes;

	public $table = "tlgProfiles";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "objectId",
	    "is_leader",
		"tlg_group_address",
		"tlg_group_address_mm",
		"tlg_group_key_activity",
		"tlg_group_key_activity_mm",
		"tlg_group_key_skills",
		"tlg_group_key_skills_mm",
		"tlg_group_lat_address",
		"tlg_group_lng_address",
		"tlg_group_logo",
		"tlg_group_member_no",
		"tlg_group_name",
		"tlg_group_name_mm",
		"tlg_group_other_member_no",
		"tlg_leader_fb_link",
		"tlg_leader_img",
		"tlg_leader_name",
		"tlg_leader_name_mm",
		"tlg_leader_ph",
		"tlg_leader_role",
		"tlg_member_ph",
		"tlg_member_ph_no"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "objectId" => "string",
        "is_leader" => "boolean",
		"tlg_group_address" => "string",
		"tlg_group_address_mm" => "string",
		"tlg_group_key_activity" => "string",
		"tlg_group_key_activity_mm" => "string",
		"tlg_group_key_skills" => "string",
		"tlg_group_key_skills_mm" => "string",
		"tlg_group_lat_address" => "string",
		"tlg_group_lng_address" => "string",
		"tlg_group_logo" => "string",
		"tlg_group_member_no" => "string",
		"tlg_group_name" => "string",
		"tlg_group_name_mm" => "string",
		"tlg_group_other_member_no" => "string",
		"tlg_leader_fb_link" => "string",
		"tlg_leader_img" => "string",
		"tlg_leader_name" => "string",
		"tlg_leader_name_mm" => "string",
		"tlg_leader_ph" => "string",
		"tlg_leader_role" => "string",
		"tlg_member_ph" => "string",
		"tlg_member_ph_no" => "string"
    ];

	public static $rules = [
	    "tlg_group_address" => "required",
		"tlg_group_address_mm" => "required"
	];

}
