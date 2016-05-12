<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

	public $table = "categories";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "objectId",
		"name",
		"name_mm",
		"image"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "objectId" => "string",
		"name" => "string",
		"name_mm" => "string",
		"image" => "string"
    ];

	public static $rules = [
	    
	];

}
