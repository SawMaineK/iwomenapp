<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetitionGroupUser extends Model
{
    protected $table = 'competition_group_users';

    public function answer()
    {
        return $this->hasMany('App\Models\MutipleAnswer', 'user_id');
    }

    /**
	 * Get the shop object.
	 */
	public function user()
	{
	    return $this->belongsTo('App\Models\User','user_id');
	}
}
