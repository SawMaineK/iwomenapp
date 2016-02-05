<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StickerStore extends Model
{
    //
    protected $table = 'stickerstore';
    protected $fillable = [
    						'objectId',
				            'stickerImg',
				            'stickerImgPath',
				            'stickerName',
				        ];
}
