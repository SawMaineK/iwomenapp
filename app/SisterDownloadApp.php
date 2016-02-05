<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SisterDownloadApp extends Model
{
    //
    protected $table = 'sisterdownloadapp';
    protected $fillable = [
    						'objectId',
				            'app_img',
				            'app_link',
				            'app_name',
				            'app_package_name',
				            'isAllow',
				        ];
}
