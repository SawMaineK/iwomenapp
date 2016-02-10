<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

	public $table = "roles";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "objectId",
		"name",
		"userId"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "objectId" => "string",
		"name" => "string",
		"userId" => "string"
    ];

	public static $rules = [
	    
	];

}
