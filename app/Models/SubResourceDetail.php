<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubResourceDetail extends Model
{
    use SoftDeletes;

	public $table = "subResourceDetails";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "authorName",
		"author_id",
		"author_img_url",
		"isAllow",
		"objectId",
		"posted_date",
		"resource_id",
		"sub_res_icon_img_url",
		"sub_resouce_content_eng",
		"sub_resouce_content_mm",
		"sub_resource_title_eng",
		"sub_resource_title_mm"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "authorName" => "string",
		"author_id" => "string",
		"author_img_url" => "string",
		"isAllow" => "boolean",
		"objectId" => "string",
		"resource_id" => "string",
		"sub_res_icon_img_url" => "string",
		"sub_resouce_content_eng" => "string",
		"sub_resouce_content_mm" => "string",
		"sub_resource_title_eng" => "string",
		"sub_resource_title_mm" => "string"
    ];

	public static $rules = [
	    
	];

	public function author()
	{
	    return $this->belongsTo('App\Models\Author', 'author_id', 'objectId');
	}

}
