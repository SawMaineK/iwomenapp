<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gcm extends Model
{
    use SoftDeletes;

	public $table = "gcms";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "reg_id",
		"device_id",
		"user_id"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "reg_id" => "string",
		"device_id" => "string",
		"user_id" => "string"
    ];

	public static $rules = [
	    "reg_id" => "required",
		"device_id" => "required",
		"user_id" => "required"
	];

}
