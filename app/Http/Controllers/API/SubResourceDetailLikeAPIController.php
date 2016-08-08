<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\SubResourceDetailLikeRepository;
use App\Models\SubResourceDetailLike;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;
use App\Models\SubResourceDetail;

class SubResourceDetailLikeAPIController extends AppBaseController
{
	/** @var  SubResourceDetailLikeRepository */
	private $subResourceDetailLikeRepository;

	function __construct(SubResourceDetailLikeRepository $subResourceDetailLikeRepo)
	{
		$this->subResourceDetailLikeRepository = $subResourceDetailLikeRepo;
	}

	/**
	 * Display a listing of the SubResourceDetailLike.
	 * GET|HEAD /subResourceDetailLikes
	 *
	 * @return Response
	 */
	public function index()
	{
		$subResourceDetailLikes = $this->subResourceDetailLikeRepository->all();

		return $this->sendResponse($subResourceDetailLikes->toArray(), "SubResourceDetailLikes retrieved successfully");
	}

	/**
	 * Show the form for creating a new SubResourceDetailLike.
	 * GET|HEAD /subResourceDetailLikes/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created SubResourceDetailLike in storage.
	 * POST /subResourceDetailLikes
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(SubResourceDetailLike::$rules) > 0)
			$this->validateRequestOrFail($request, SubResourceDetailLike::$rules);

		$input = $request->all();

		$subResourceDetailLikes = $this->subResourceDetailLikeRepository->create($input);

		$post = SubResourceDetail::find($input['postId']);
		if($post){
			$post->likes = $post->likes + 1;
			$post->update();
		}else{
			return response()->json("Invalid iWomen Post Id!",400);
		}

		return response()->json($post->likes);
	}

	public function chkUserLike(Request $request)
	{
		$liked = SubResourceDetailLike::where('postId', $request->postId)->where('userId', $request->userId)->first();
		if($liked){
			return response()->json(true);
		}
		return response()->json(false);
	}

	/**
	 * Display the specified SubResourceDetailLike.
	 * GET|HEAD /subResourceDetailLikes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$subResourceDetailLike = $this->subResourceDetailLikeRepository->apiFindOrFail($id);

		return $this->sendResponse($subResourceDetailLike->toArray(), "SubResourceDetailLike retrieved successfully");
	}

	/**
	 * Show the form for editing the specified SubResourceDetailLike.
	 * GET|HEAD /subResourceDetailLikes/{id}/edit
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
	 * Update the specified SubResourceDetailLike in storage.
	 * PUT/PATCH /subResourceDetailLikes/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var SubResourceDetailLike $subResourceDetailLike */
		$subResourceDetailLike = $this->subResourceDetailLikeRepository->apiFindOrFail($id);

		$result = $this->subResourceDetailLikeRepository->updateRich($input, $id);

		$subResourceDetailLike = $subResourceDetailLike->fresh();

		return $this->sendResponse($subResourceDetailLike->toArray(), "SubResourceDetailLike updated successfully");
	}

	/**
	 * Remove the specified SubResourceDetailLike from storage.
	 * DELETE /subResourceDetailLikes/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->subResourceDetailLikeRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "SubResourceDetailLike deleted successfully");
	}
}
