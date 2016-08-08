<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ResourceLikeRepository;
use App\Models\ResourceLike;
use App\Models\Resources;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class ResourceLikeAPIController extends AppBaseController
{
	/** @var  ResourceLikeRepository */
	private $resourceLikeRepository;

	function __construct(ResourceLikeRepository $resourceLikeRepo)
	{
		$this->resourceLikeRepository = $resourceLikeRepo;
	}

	/**
	 * Display a listing of the ResourceLike.
	 * GET|HEAD /resourceLikes
	 *
	 * @return Response
	 */
	public function index()
	{
		$resourceLikes = $this->resourceLikeRepository->all();

		return $this->sendResponse($resourceLikes->toArray(), "ResourceLikes retrieved successfully");
	}

	/**
	 * Show the form for creating a new ResourceLike.
	 * GET|HEAD /resourceLikes/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created ResourceLike in storage.
	 * POST /resourceLikes
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(ResourceLike::$rules) > 0)
			$this->validateRequestOrFail($request, ResourceLike::$rules);

		$input = $request->all();

		$resourceLikes = $this->resourceLikeRepository->create($input);

		$resource = Resources::find($input['postId']);
		if($resource){
			$resource->likes = $resource->likes + 1;
			$resource->update();
		}else{
			return response()->json("Invalid Resources Id!",400);
		}

		return response()->json($resource->likes);
	}

	public function chkUserLike(Request $request)
	{
		$like = ResourceLike::where('postId', $request->postId)->where('userId', $request->userId)->first();
		if($like){
			return response()->json(true);
		}
		return response()->json(false);
	}

	/**
	 * Display the specified ResourceLike.
	 * GET|HEAD /resourceLikes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$resourceLike = $this->resourceLikeRepository->apiFindOrFail($id);

		return $this->sendResponse($resourceLike->toArray(), "ResourceLike retrieved successfully");
	}

	/**
	 * Show the form for editing the specified ResourceLike.
	 * GET|HEAD /resourceLikes/{id}/edit
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
	 * Update the specified ResourceLike in storage.
	 * PUT/PATCH /resourceLikes/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var ResourceLike $resourceLike */
		$resourceLike = $this->resourceLikeRepository->apiFindOrFail($id);

		$result = $this->resourceLikeRepository->updateRich($input, $id);

		$resourceLike = $resourceLike->fresh();

		return $this->sendResponse($resourceLike->toArray(), "ResourceLike updated successfully");
	}

	/**
	 * Remove the specified ResourceLike from storage.
	 * DELETE /resourceLikes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->resourceLikeRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "ResourceLike deleted successfully");
	}
}
