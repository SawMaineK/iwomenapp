<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;

	public $table = "authors";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "objectId",
		"authorImg",
		"authorInfoEng",
		"authorInfoMM",
		"authorName",
		"authorTitleEng",
		"authorTitleMM"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "objectId" => "string",
		"authorImg" => "string",
		"authorInfoEng" => "string",
		"authorInfoMM" => "string",
		"authorName" => "string",
		"authorTitleEng" => "string",
		"authorTitleMM" => "string"
    ];

	public static $rules = [
	    
	];

}
