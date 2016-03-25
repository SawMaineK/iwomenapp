<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadImage($file, $path, $resize = [400, 200, 100]){
        $filename = "photo_".date('YmdHis')."_".rand().$file->getClientOriginalName();;
        $file_path = public_path().$path;
        $file->move($file_path, $filename);
        $size = getimagesize($file_path.$filename);
        switch(strtolower($size['mime']))
        {
            case 'image/png':
                $source_image = imagecreatefrompng($file_path.$filename);
                break;
            case 'image/jpeg':
                $source_image = imagecreatefromjpeg($file_path.$filename);
                break;
            case 'image/gif':
                $source_image = imagecreatefromgif($file_path.$filename);
                break;
            default: die('image type not supported');
        }
        $resize_url = [];
        foreach ($resize as $key => $value) {
            $width      = $value; 
            $height     = round($width*$size[1]/$size[0]);
            $photoX     = ImagesX($source_image);
            $photoY     = ImagesY($source_image);
            $images_fin = ImageCreateTrueColor($width, $height);
            ImageCopyResampled($images_fin, $source_image, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
            if(!file_exists($file_path.'x'.$value)){
                mkdir($file_path.'x'.$value);
            }
            $resize_url[] = "http://api.iwomenapp.org".$path.'x'.$value.'/'.$filename;
            ImageJPEG($images_fin, $file_path.'x'.$value.'/'.$filename, 100);
        }
        ImageDestroy($source_image);
        ImageDestroy($images_fin);
        return ['__type'=>'File', 'name' => $filename, 'url'=>"http://api.iwomenapp.org".$path.$filename,'resize_url' => $resize_url];
    }

    public function uploadAudio($file, $path){
        $filename = "audio_".date('YmdHis')."_".rand().$file->getClientOriginalName();
        $file_path = public_path().$path;
        $file->move($file_path, $filename);

        return 'http://api.iwomenapp.org'.$path.$filename;
    }

    public function uploadVideo($file, $path){
        $filename = "video_".date('YmdHis')."_".rand().$file->getClientOriginalName();
        $file_path = public_path().$path;
        $file->move($file_path, $filename);

        return 'http://api.iwomenapp.org'.$path.$filename;
    }

    public function uploadAPK($file, $path){
        $filename = "apk_".date('YmdHis')."_".rand().$file->getClientOriginalName();
        $file_path = public_path().$path;
        $file->move($file_path, $filename);

        return $filename;
    }
}
