<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GcmMessage extends Model
{
    use SoftDeletes;

	public $table = "gcmMessages";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "title",
		"message",
		"user_id",
		"image"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "title" => "string",
		"message" => "string",
		"user_id" => "string",
		"image" => "string"
    ];

	public static $rules = [
	    "title" => "required",
		"message" => "required",
		"user_id" => "required"
	];

}
