<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calendar extends Model
{
    use SoftDeletes;

	public $table = "calendars";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "objectId",
	    "userId",
		"title",
		"title_mm",
		"description",
		"description_mm",
		"location",
		"location_mm",
		"start_date",
		"end_date",
		"start_time",
		"end_time"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "objectId" => "string",
        "userId" => "integer",
		"title" => "string",
		"title_mm" => "string",
		"description" => "string",
		"description_mm" => "string",
		"location" => "string",
		"location_mm" => "string",
		"start_time" => "string",
		"end_time" => "string"
    ];

	public static $rules = [
	    "userId" => "required"
	    "description_mm" => "required"
	];

}
