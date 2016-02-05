<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

	public $table = "posts";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "objectId",
		"content",
		"contentType",
		"content_mm",
		"image",
		"likes",
		"postUploadName",
		"postUploadPersonImg",
		"postUploadedDate",
		"suggest_section",
		"suggest_section_eng",
		"title",
		"titleMm",
		"userId",
		"userRelation",
		"videoId",
		"audioFile",
		"comment_count",
		"isAllow",
		"postUploadUserImgPath",
		"share_count",
		"category_id"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "objectId" => "string",
		"content" => "string",
		"contentType" => "string",
		"content_mm" => "string",
		"image" => "string",
		"likes" => "integer",
		"postUploadName" => "string",
		"postUploadPersonImg" => "string",
		"suggest_section" => "string",
		"suggest_section_eng" => "string",
		"title" => "string",
		"titleMm" => "string",
		"userId" => "string",
		"userRelation" => "string",
		"videoId" => "string",
		"audioFile" => "string",
		"comment_count" => "integer",
		"isAllow" => "boolean",
		"postUploadUserImgPath" => "string",
		"share_count" => "integer",
		"category_id" => "string"
    ];

	public static $rules = [
	    "content" => "required",
		"contentType" => "required",
		"content_mm" => "required",
		"postUploadName" => "required",
		"title" => "required",
		"titleMm" => "required"
	];

}
