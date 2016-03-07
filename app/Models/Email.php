<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use SoftDeletes;

	public $table = "emails";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "name",
		"email",
		"message"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "name" => "string",
		"email" => "string",
		"message" => "string"
    ];

	public static $rules = [
	    "name" => "required",
		"email" => "required",
		"message" => "required"
	];

}
