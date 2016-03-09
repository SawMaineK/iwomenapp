<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\TlgProfile;
use App\Models\IwomenPost;
use App\Models\Resources;
use App\Models\Author;
use App\Models\Post;
use App\Models\Comment;
use App\Models\SubResourceDetail;
use App\Models\SisterDownloadApp;
use App\Models\StickerStore;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function import(){
     /*   $dataJson = $this->readJson('TlgProfile.json');
        foreach ($dataJson['results'] as $key => $data) {
            $data['tlg_group_logo'] = isset($data['tlg_group_logo']) ? $data['tlg_group_logo']['url'] : '';
            $data['tlg_leader_img'] = isset($data['tlg_leader_img']) ? $data['tlg_leader_img']['url'] : '';
            $data['tlg_member_ph'] = isset($data['tlg_member_ph']) ? json_encode($data['tlg_member_ph']) : '';
            TlgProfile::create($data);
        }
        $dataJson = $this->readJson('Post.json');
        foreach ($dataJson['results'] as $key => $data) {
            $data['image'] = isset($data['image']) ? $data['image']['url'] : '';
            $data['postUploadedDate'] = isset($data['postUploadedDate']) ? $data['postUploadedDate']['iso'] : '';
            $data['userId'] = isset($data['userId']) ? $data['userId']['objectId'] : '';
            Post::create($data);
        }*/
        $dataJson = $this->readJson('IwomenPost.json');
        foreach ($dataJson['results'] as $key => $data) {
            $data['image'] = isset($data['image']) ? $data['image']['url'] : '';
            $data['postUploadedDate'] = isset($data['postUploadedDate']) ? $data['postUploadedDate']['iso'] : '';
            $data['userId'] = isset($data['userId']) ? $data['userId']['objectId'] : '';
            $data['authorId'] = isset($data['authorId']) ? $data['authorId']['objectId'] : '';
            $data['postUploadPersonImg'] = isset($data['postUploadPersonImg']) ? $data['postUploadPersonImg']['url'] : '';
            $data['audioFile'] = isset($data['audioFile']) ? $data['audioFile']['url'] : '';
            IwomenPost::create($data);
        }/*
        $dataJson = $this->readJson('Resources.json');
        foreach ($dataJson['results'] as $key => $data) {
            $data['resource_icon_img'] = isset($data['resource_icon_img']) ? $data['resource_icon_img']['url'] : '';
            Resources::create($data);
        }*/
        $dataJson = $this->readJson('Author.json');
        foreach ($dataJson['results'] as $key => $data) {
            $data['authorImg'] = isset($data['authorImg']) ? $data['authorImg']['url'] : '';
            Author::create($data);
        }/*
        $dataJson = $this->readJson('Comment.json');
        foreach ($dataJson['results'] as $key => $data) {
            $data['comment_created_time'] = isset($data['comment_created_time']) ? $data['comment_created_time']['iso'] : '';
            $data['postId'] = isset($data['postId']) ? $data['postId']['objectId'] : '';
            $data['userId'] = isset($data['userId']) ? $data['userId']['objectId'] : '';
            Comment::create($data);
        }
        $dataJson = $this->readJson('SubResourceDetail.json');
        foreach ($dataJson['results'] as $key => $data) {
            $data['author_id'] = isset($data['author_id']) ? $data['author_id']['objectId'] : '';
            $data['posted_date'] = isset($data['posted_date']) ? $data['posted_date']['iso'] : '';
            $data['resource_id'] = isset($data['resource_id']) ? $data['resource_id']['objectId'] : '';
            SubResourceDetail::create($data);
        }
        $dataJson = $this->readJson('SisterDownloadApp.json');
        foreach ($dataJson['results'] as $key => $data) {
            $data['app_img'] = isset($data['app_img']) ? $data['app_img']['url'] : '';
            SisterDownloadApp::create($data);
        }
        $dataJson = $this->readJson('StickerStore.json');
        foreach ($dataJson['results'] as $key => $data) {
            $data['stickerImg'] = isset($data['stickerImg']) ? $data['stickerImg']['url'] : '';
            StickerStore::create($data);
        }
        $dataJson = $this->readJson('User.json');
        foreach ($dataJson['results'] as $key => $data) {
            $data['password'] = isset($data['bcryptPassword']) ? $data['bcryptPassword'] : '';
            $data['user_profile_img'] = isset($data['user_profile_img']) ? $data['user_profile_img']['url'] : '';
            $data['profileimage'] = isset($data['profileimage']) ? $data['profileimage']['url'] : '';
            User::create($data);
        }*/
        return response()->json('success');
    }

    /**
     * To Read from Json File.
     */
    public function readJson($fileName){
        $file = "database/".$fileName;
        if(file_exists($file)){
            $jsonString = file_get_contents($file);
            $jsonArr = json_decode($jsonString,true);
            return $jsonArr;
        }else{
            return array();
        }
        
    }
}
