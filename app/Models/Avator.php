<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Avator extends Model
{
    use SoftDeletes;

	public $table = "avators";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "objectId",
		"avatorImg",
		"avatorImgPath",
		"avatorName"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "objectId" => "string",
		"avatorImg" => "string",
		"avatorImgPath" => "string",
		"avatorName" => "string"
    ];

	public static $rules = [
	    
	];

}
