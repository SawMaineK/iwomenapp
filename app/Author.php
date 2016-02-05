<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $table = 'author';
    protected $fillable = [	
    						'objectId',
				            'authorImg',
				            'authorInfoEng',
				            'authorInfoMM',
				            'authorName',
				            'authorTitleEng',
				            'authorTitleMM',
				        ];
}
