<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShareUser extends Model
{
    use SoftDeletes;

	public $table = "shareUsers";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "user_id",
		"share_objectId"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "user_id" => "string",
		"share_objectId" => "string"
    ];

	public static $rules = [
	    "user_id" => "required",
		"share_objectId" => "required|exists:users,objectId|unique:shareUsers,share_objectId"
	];

}
