<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MutipleOption extends Model
{
    use SoftDeletes;

	public $table = "mutipleOptions";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "mutiple_question_id",
		"option",
		"option_mm"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "mutiple_question_id" => "integer",
		"option" => "string",
		"option_mm" => "string"
    ];

	public static $rules = [
	    "mutiple_question_id" => "required",
		"option" => "required",
		"option_mm" => "required"
	];

}
