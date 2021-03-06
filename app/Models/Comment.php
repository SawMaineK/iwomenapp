<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

	public $table = "comments";
    
	protected $dates = ['deleted_at'];

	public $timestamps = true;

	public $fillable = [
	    "objectId",
	    "postType",
		"comment_contents",
		"comment_created_time",
		"postId",
		"sticker_img_path",
		"userId",
		"user_img_path",
		"user_name"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "objectId" => "string",
        "postType" => "string",
		"comment_contents" => "string",
		"postId" => "string",
		"sticker_img_path" => "string",
		"userId" => "string",
		"user_img_path" => "string",
		"user_name" => "string"
    ];

	public static $rules = [

		"postId"	=> "required",
	    "userId" 	=> "required",
	    
	];

}
