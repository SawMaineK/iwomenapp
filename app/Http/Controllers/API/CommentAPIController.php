<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\CommentRepository;
use App\Models\Comment;
use App\Models\Post;
use App\Models\IwomenPost;
use App\Models\SubResourceDetail;
use App\Models\Resources;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;
use App\Models\Gcm;
use PushNotification;

class CommentAPIController extends AppBaseController
{
	/** @var  CommentRepository */
	private $commentRepository;

	function __construct(CommentRepository $commentRepo)
	{
		$this->commentRepository = $commentRepo;
	}

	/**
	 * Display a listing of the Comment.
	 * GET|HEAD /comments
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$offset  = $request->page ? $request->page : 1;
		$limit   = $request->limit ? $request->limit : 20;
		$post_id = $request->post_id;

		$offset  = ($offset - 1) * $limit;
		
		if($post_id){
			$posts = Comment::where('postId', $post_id)->orderBy('id','desc')->offset($offset)->limit($limit)->get();
			foreach ($posts as $key => $value) {
				$posts[$key]['human_created_at'] = $value->created_at->diffForHumans();
				$posts[$key]['human_updated_at'] = $value->updated_at->diffForHumans();
			}
		}
		else
			$posts = Comment::orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($posts);
	}

	/**
	 * Show the form for creating a new Comment.
	 * GET|HEAD /comments/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Comment in storage.
	 * POST /comments
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Comment::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, Comment::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$input['objectId'] = str_random(10);

		$comments = $this->commentRepository->create($input);


		if(isset($input['postType']) && $input['postType'] == 'iWomenPost'){
			$post = IwomenPost::where('objectId',$input['postId'])->first();
			if($post){
				$post->comment_count = $post->comment_count + 1;
				$post->update();
			}
		}else if(isset($input['postType']) && $input['postType'] == 'Post'){
			$post = Post::where('objectId',$input['postId'])->first();
			if($post){
				$post->comment_count = $post->comment_count + 1;
				$post->update();
			}
		}else if(isset($input['postType']) && $input['postType'] == 'SubResourceDetail'){
			$post = SubResourceDetail::where('objectId',$input['postId'])->first();
			if($post){
				$post->comment_count = $post->comment_count + 1;
				$post->update();
			}
		}else if(isset($input['postType']) && $input['postType'] == 'Resources'){
			$post = Resources::where('objectId',$input['postId'])->first();
			if($post){
				$post->comment_count = $post->comment_count + 1;
				$post->update();
			}
		}

		if((isset($input['postType']) && $input['postType'] == 'Post') || (isset($input['postType']) && $input['postType'] == 'SubResourceDetail') || (isset($input['postType']) && $input['postType'] == 'Resources')){

			if(isset($post) && $post){
				
				$device_list = [];
				$gcm = Gcm::where('user_id',$post->userId)->first();
				
				if($gcm){
					$device_list[] = PushNotification::Device($gcm->reg_id);
			  		$message['title'] = 'New Comment';
			  		$message['message'] = $comments->comment_contents;
					$devices = PushNotification::DeviceCollection($device_list);
					$message = PushNotification::Message(json_encode($message),array());

					$collection = PushNotification::app('appNameAndroid')
					    ->to($devices)
					    ->send($message);
				}
			}
		}
		
		$comments['comment_count'] = $post->comment_count;

		return $this->sendResponse($comments->toArray(), "Comment saved successfully");
	}

	/**
	 * Display the specified Comment.
	 * GET|HEAD /comments/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$comment = $this->commentRepository->apiFindOrFail($id);

		return $this->sendResponse($comment->toArray(), "Comment retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Comment.
	 * GET|HEAD /comments/{id}/edit
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		// maybe, you can return a template for JS
//		Errors::throwHttpExceptionWithCode(Errors::EDITION_FORM_NOT_EXISTS, ['id' => $id], static::getHATEOAS(['%id' => $id]));
	}

	/**
	 * Update the specified Comment in storage.
	 * PUT/PATCH /comments/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Comment $comment */
		$comment = $this->commentRepository->apiFindOrFail($id);

		$result = $this->commentRepository->updateRich($input, $id);

		$comment = $comment->fresh();

		return $this->sendResponse($comment->toArray(), "Comment updated successfully");
	}

	/**
	 * Remove the specified Comment from storage.
	 * DELETE /comments/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->commentRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Comment deleted successfully");
	}
}
