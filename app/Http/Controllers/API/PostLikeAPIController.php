<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\PostLikeRepository;
use App\Models\PostLike;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;
use App\Models\Post;

class PostLikeAPIController extends AppBaseController
{
	/** @var  PostLikeRepository */
	private $postLikeRepository;

	function __construct(PostLikeRepository $postLikeRepo)
	{
		$this->postLikeRepository = $postLikeRepo;
	}

	/**
	 * Display a listing of the PostLike.
	 * GET|HEAD /postLikes
	 *
	 * @return Response
	 */
	public function index()
	{
		$postLikes = $this->postLikeRepository->all();

		return $this->sendResponse($postLikes->toArray(), "PostLikes retrieved successfully");
	}

	/**
	 * Show the form for creating a new PostLike.
	 * GET|HEAD /postLikes/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created PostLike in storage.
	 * POST /postLikes
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(PostLike::$rules) > 0)
			$this->validateRequestOrFail($request, PostLike::$rules);

		$input = $request->all();

		$postLikes = $this->postLikeRepository->create($input);

		$post = Post::find($input['postId']);
		if($post){
			$post->likes = $post->likes + 1;
			$post->update();
		}else{
			return response()->json("Invalid Post Id!",400);
		}

		return response()->json($postLikes);
	}

	public function chkUserLike(Request $request)
	{
		$like = PostLike::where('postId', $request->postId)->where('userId', $request->userId)->first();
		if($like){
			return response()->json(true);
		}
		return response()->json(false);
	}

	/**
	 * Display the specified PostLike.
	 * GET|HEAD /postLikes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$postLike = $this->postLikeRepository->apiFindOrFail($id);

		return $this->sendResponse($postLike->toArray(), "PostLike retrieved successfully");
	}

	/**
	 * Show the form for editing the specified PostLike.
	 * GET|HEAD /postLikes/{id}/edit
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
	 * Update the specified PostLike in storage.
	 * PUT/PATCH /postLikes/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var PostLike $postLike */
		$postLike = $this->postLikeRepository->apiFindOrFail($id);

		$result = $this->postLikeRepository->updateRich($input, $id);

		$postLike = $postLike->fresh();

		return $this->sendResponse($postLike->toArray(), "PostLike updated successfully");
	}

	/**
	 * Remove the specified PostLike from storage.
	 * DELETE /postLikes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->postLikeRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "PostLike deleted successfully");
	}
}
