<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

	public $table = "users";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "objectId",
		"username",
		"password",
		"email",
		"facebookId",
		"isTlgTownshipExit",
		"isTestAcc",
		"phoneNo",
		"profileimage",
		"searchName",
		"tlg_city_address",
		"user_profile_img",
		"updatedAt",
		"registerBODname",
		"userImgPath"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "objectId" => "string",
		"username" => "string",
		"password" => "string",
		"email" => "string",
		"facebookId" => "string",
		"isTlgTownshipExit" => "boolean",
		"isTestAcc" => "boolean",
		"phoneNo" => "string",
		"profileimage" => "string",
		"searchName" => "string",
		"tlg_city_address" => "string",
		"user_profile_img" => "string",
		"updatedAt" => "string",
		"registerBODname" => "string",
		"userImgPath" => "string"
    ];

	public static $rules = [
		"username"	=> "required",
	    "phoneNo" 	=> "required",
	    "password" 	=> "required|min:6",
	];

	/**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','facebookId','deleted_at','created_at','updated_at','updatedAt',
    ];

}
