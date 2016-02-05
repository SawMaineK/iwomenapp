<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StickerStore extends Model
{
    use SoftDeletes;

	public $table = "stickerStores";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "objectId",
		"stickerImg",
		"stickerImgPath",
		"stickerName"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "objectId" => "string",
		"stickerImg" => "string",
		"stickerImgPath" => "string",
		"stickerName" => "string"
    ];

	public static $rules = [
	    
	];

}
