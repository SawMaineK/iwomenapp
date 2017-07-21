<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubResourceDetailAudio extends Model
{
    use SoftDeletes;

	public $table = "subResourceDetailAudios";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "post_id",
		"name",
		"name_mm",
		"links_path",
		"uploaded_date",
		"isAllow"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "post_id" => "string",
		"name" => "string",
		"name_mm" => "string",
		"links_path" => "string",
		"uploaded_date" => "string",
		"isAllow" => "boolean"
    ];

	public static $rules = [
	    "post_id" => "required",
		"name" => "required",
		"name_mm" => "required",
		"links_path" => "required",
		"uploaded_date" => "required"
	];

}
