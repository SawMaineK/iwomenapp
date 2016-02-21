<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadAPK($file, $path){
        $filename = "apk_".date('YmdHis')."_".rand().$file->getClientOriginalName();
        $file_path = public_path().$path;
        $file->move($file_path, $filename);

        return $filename;
    }
}
