<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'post';
    protected $fillable = [	
				            'objectId',
				            'content',
				            'contentType',
				            'content_mm',
				            'image',
				            'likes',
				            'postUploadName',
				            'postUploadPersonImg',
				            'postUploadedDate',
				            'suggest_section',
				            'suggest_section_eng',
				            'title',
				            'titleMm',
				            'userId',
				            'userRelation',
				            'videoId',
				            'audioFile',
				            'comment_count',
				            'isAllow',
				            'postUploadUserImgPath',
				            'share_count',
				        ];
}
