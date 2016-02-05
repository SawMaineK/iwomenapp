<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IwomenPost extends Model
{
    use SoftDeletes;

	public $table = "iwomenPosts";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "objectId",
		"audioFile",
		"authorId",
		"comment_count",
		"content",
		"contentType",
		"content_mm",
		"credit_link",
		"credit_link_mm",
		"credit_logo_url",
		"credit_name",
		"image",
		"isAllow",
		"likes",
		"postUploadName",
		"postUploadPersonImg",
		"postUploadUserImgPath",
		"postUploadedDate",
		"post_author_role",
		"post_author_role_mm",
		"share_count",
		"suggest_section_eng",
		"title",
		"titleMm",
		"userId",
		"videoId"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "objectId" => "string",
		"audioFile" => "string",
		"authorId" => "string",
		"comment_count" => "integer",
		"content" => "string",
		"contentType" => "string",
		"content_mm" => "string",
		"credit_link" => "string",
		"credit_link_mm" => "string",
		"credit_logo_url" => "string",
		"credit_name" => "string",
		"image" => "string",
		"isAllow" => "boolean",
		"likes" => "integer",
		"postUploadName" => "string",
		"postUploadPersonImg" => "string",
		"postUploadUserImgPath" => "string",
		"post_author_role" => "string",
		"post_author_role_mm" => "string",
		"share_count" => "integer",
		"suggest_section_eng" => "string",
		"title" => "string",
		"titleMm" => "string",
		"userId" => "string",
		"videoId" => "string"
    ];

	public static $rules = [
	    
	];

}
