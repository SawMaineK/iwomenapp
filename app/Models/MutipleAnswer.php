<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MutipleAnswer extends Model
{
    use SoftDeletes;

	public $table = "mutipleAnswers";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "mutiple_question_id",
		"answer",
		"user_id"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "mutiple_question_id" => "integer",
		"answer" => "string",
		"user_id" => "integer"
    ];

	public static $rules = [
		"answer" => "required",
		"user_id" => "required"
	];

	/**
	 * Get the shop object.
	 */
	public function user()
	{
	    return $this->belongsTo('App\Models\User','user_id');
	}

}
