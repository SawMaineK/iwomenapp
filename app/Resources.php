<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    //
    protected $table = 'resources';
    protected $fillable = [	
    						'objectId',
				            'author_img_path',
				            'isAllow',
				            'resource_author_id',
				            'resource_author_name',
				            'resource_icon_img',
				            'resource_title_eng',
				            'resource_title_mm',
				        ];

}
