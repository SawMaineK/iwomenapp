<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SisterDownloadApp extends Model
{
    use SoftDeletes;

	public $table = "sisterDownloadApps";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "objectId",
		"app_img",
		"app_link",
		"app_name",
		"app_package_name",
		"isAllow"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "objectId" => "string",
		"app_img" => "string",
		"app_link" => "string",
		"app_name" => "string",
		"app_package_name" => "string",
		"isAllow" => "boolean"
    ];

	public static $rules = [
	    
	];

}
