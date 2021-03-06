<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PointPrice extends Model
{
    use SoftDeletes;

	public $table = "pointPrices";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "point",
		"price",
		"price_mm"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "point" => "integer",
		"price" => "string",
		"price_mm" => "string"
    ];

	public static $rules = [
	    "point" => "required",
		"price" => "required"
	];

}
