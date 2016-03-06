<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostLike extends Model
{
    use SoftDeletes;

	public $table = "postLikes";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "objectId",
		"postId",
		"userId"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "objectId" => "string",
		"postId" => "integer",
		"userId" => "integer"
    ];

	public static $rules = [
	    
	];

}
