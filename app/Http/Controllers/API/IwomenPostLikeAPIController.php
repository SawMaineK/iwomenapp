<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\IwomenPostLikeRepository;
use App\Models\IwomenPostLike;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;
use App\Models\IwomenPost;

class IwomenPostLikeAPIController extends AppBaseController
{
	/** @var  IwomenPostLikeRepository */
	private $iwomenPostLikeRepository;

	function __construct(IwomenPostLikeRepository $iwomenPostLikeRepo)
	{
		$this->iwomenPostLikeRepository = $iwomenPostLikeRepo;
	}

	/**
	 * Display a listing of the IwomenPostLike.
	 * GET|HEAD /iwomenPostLikes
	 *
	 * @return Response
	 */
	public function index()
	{
		$iwomenPostLikes = $this->iwomenPostLikeRepository->all();

		return $this->sendResponse($iwomenPostLikes->toArray(), "IwomenPostLikes retrieved successfully");
	}

	/**
	 * Show the form for creating a new IwomenPostLike.
	 * GET|HEAD /iwomenPostLikes/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created IwomenPostLike in storage.
	 * POST /iwomenPostLikes
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(IwomenPostLike::$rules) > 0)
			$this->validateRequestOrFail($request, IwomenPostLike::$rules);

		$input = $request->all();

		$iwomenPostLikes = $this->iwomenPostLikeRepository->create($input);

		$post = IwomenPost::find($input['postId']);
		if($post){
			$post->likes = $post->likes + 1;
			$post->update();
		}

		return $this->sendResponse($iwomenPostLikes->toArray(), "IwomenPostLike saved successfully");
	}

	public function chkUserLike(Request $request)
	{
		$like = IwomenPostLike::where('postId', $request->postId)->where('userId', $request->userId)->first();
		if($like){
			return response()->json(true);
		}
		return response()->json(false);
	}

	/**
	 * Display the specified IwomenPostLike.
	 * GET|HEAD /iwomenPostLikes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$iwomenPostLike = $this->iwomenPostLikeRepository->apiFindOrFail($id);

		return $this->sendResponse($iwomenPostLike->toArray(), "IwomenPostLike retrieved successfully");
	}

	/**
	 * Show the form for editing the specified IwomenPostLike.
	 * GET|HEAD /iwomenPostLikes/{id}/edit
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
	 * Update the specified IwomenPostLike in storage.
	 * PUT/PATCH /iwomenPostLikes/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var IwomenPostLike $iwomenPostLike */
		$iwomenPostLike = $this->iwomenPostLikeRepository->apiFindOrFail($id);

		$result = $this->iwomenPostLikeRepository->updateRich($input, $id);

		$iwomenPostLike = $iwomenPostLike->fresh();

		return $this->sendResponse($iwomenPostLike->toArray(), "IwomenPostLike updated successfully");
	}

	/**
	 * Remove the specified IwomenPostLike from storage.
	 * DELETE /iwomenPostLikes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->iwomenPostLikeRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "IwomenPostLike deleted successfully");
	}
}
