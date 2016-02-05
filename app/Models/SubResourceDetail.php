<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubResourceDetail extends Model
{
    use SoftDeletes;

	public $table = "subResourceDetails";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "objectId",
		"author_img_path",
		"isAllow",
		"resource_author_id",
		"resource_author_name",
		"resource_icon_img",
		"resource_title_eng",
		"resource_title_mm"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "objectId" => "string",
		"author_img_path" => "string",
		"isAllow" => "boolean",
		"resource_author_id" => "string",
		"resource_author_name" => "string",
		"resource_icon_img" => "string",
		"resource_title_eng" => "string",
		"resource_title_mm" => "string"
    ];

	public static $rules = [
	    
	];

}
