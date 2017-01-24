<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\reportPostRepository;
use App\Models\reportPost;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class reportPostAPIController extends AppBaseController
{
	/** @var  reportPostRepository */
	private $reportPostRepository;

	function __construct(reportPostRepository $reportPostRepo)
	{
		$this->reportPostRepository = $reportPostRepo;
	}

	/**
	 * Display a listing of the reportPost.
	 * GET|HEAD /reportPosts
	 *
	 * @return Response
	 */
	public function index()
	{
		$reportPosts = $this->reportPostRepository->all();

		return $this->sendResponse($reportPosts->toArray(), "reportPosts retrieved successfully");
	}

	/**
	 * Show the form for creating a new reportPost.
	 * GET|HEAD /reportPosts/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created reportPost in storage.
	 * POST /reportPosts
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(reportPost::$rules) > 0)
			$this->validateRequestOrFail($request, reportPost::$rules);

		$input = $request->all();

		$user = User::where('id', $input['userId'])->first();

		if($user){
			$report = reportPost::where('postId', $input['postId'])->where('userId', $input['userId'])->first();
			if(!$report){
				
				$input['point'] = reportPost::where('postId', $input['postId'])->count() + 1;
				
				$reportPosts = $this->reportPostRepository->create($input);

				return $this->sendResponse($reportPosts->toArray(), "reportPost saved successfully");
			}else{
				return response()->json("The report has already been taken.", 403);
			}
		}

		
	}

	/**
	 * Display the specified reportPost.
	 * GET|HEAD /reportPosts/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$reportPost = $this->reportPostRepository->apiFindOrFail($id);

		return $this->sendResponse($reportPost->toArray(), "reportPost retrieved successfully");
	}

	/**
	 * Show the form for editing the specified reportPost.
	 * GET|HEAD /reportPosts/{id}/edit
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
	 * Update the specified reportPost in storage.
	 * PUT/PATCH /reportPosts/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var reportPost $reportPost */
		$reportPost = $this->reportPostRepository->apiFindOrFail($id);

		$result = $this->reportPostRepository->updateRich($input, $id);

		$reportPost = $reportPost->fresh();

		return $this->sendResponse($reportPost->toArray(), "reportPost updated successfully");
	}

	/**
	 * Remove the specified reportPost from storage.
	 * DELETE /reportPosts/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->reportPostRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "reportPost deleted successfully");
	}
}
