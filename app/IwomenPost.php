<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IwomenPost extends Model
{
    //
    protected $table = 'iwomenpost';
    protected $fillable = [
    						'objectId',
				            'audioFile',
				            'authorId',
				            'comment_count',
				            'content',
				            'contentType',
				            'content_mm',
				            'credit_link',
				            'credit_link_mm',
				            'credit_logo_url',
				            'credit_name',
				            'image',
				            'isAllow',
				            'likes',
				            'postUploadName',
				            'postUploadPersonImg',
				            'postUploadUserImgPath',
				            'postUploadedDate',
				            'post_author_role',
				            'post_author_role_mm',
				            'share_count',
				            'suggest_section_eng',
				            'title',
				            'titleMm',
				            'userId',
				            'videoId',
				        ];
}
