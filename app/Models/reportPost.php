<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reportPost extends Model
{
    use SoftDeletes;

	public $table = "reportPosts";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "postId",
		"userId",
		"point",
		"report_count"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "postId" => "integer",
		"userId" => "integer",
		"point" => "integer",
		"report_count" => "integer"
    ];

	public static $rules = [
	    
	];

}
