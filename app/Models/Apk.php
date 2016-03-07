<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apk extends Model
{
    use SoftDeletes;

	public $table = "apks";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "name",
		"version_id",
		"version_name"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "name" => "string",
		"version_id" => "integer",
		"version_name" => "string"
    ];

	public static $rules = [
	    
	];

}
