<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comment';
    protected $fillable = [	
    						'objectId',
				            'comment_contents',
				            'comment_created_time',
				            'postId',
				            'sticker_img_path',
				            'userId',
				            'user_img_path',
				            'user_name',
				        ];
}
