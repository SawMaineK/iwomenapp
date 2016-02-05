<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubResourceDetail extends Model
{
    //
    protected $table = 'subresourcedetial';
    protected $fillable = [	
							'objectId',
				            'authorName',
				            'author_id',
				            'author_img_url',
				            'author_relation',
				            'isAllow',
				            'posted_date',
				            'resource_id',
				            'sub_res_icon_img_url',
				            'sub_resource_content_eng',
				            'sub_resource_content_mm',
				            'sub_resource_title_eng',
				            'sub_resource_title_mm',
				        ];

}
