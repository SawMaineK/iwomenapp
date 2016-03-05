<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\CommentRepository;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

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
		$limit   = $request->limit ? $request->limit : 12;
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
