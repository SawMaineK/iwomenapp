<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MutipleQuestion extends Model
{
    use SoftDeletes;

	public $table = "mutipleQuestions";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "question_id",
		"type",
		"question",
		"question_mm"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "question_id" => "integer",
		"type" => "string",
		"question" => "string",
		"question_mm" => "string"
    ];

	public static $rules = [
	    "question_id" => "required",
		"type" => "required",
		"question" => "required",
		"question_mm" => "required"
	];

}
