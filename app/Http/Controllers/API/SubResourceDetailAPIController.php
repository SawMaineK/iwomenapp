<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\SubResourceDetailRepository;
use App\Models\SubResourceDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class SubResourceDetailAPIController extends AppBaseController
{
	/** @var  SubResourceDetailRepository */
	private $subResourceDetailRepository;

	function __construct(SubResourceDetailRepository $subResourceDetailRepo)
	{
		$this->subResourceDetailRepository = $subResourceDetailRepo;
	}

	/**
	 * Display a listing of the SubResourceDetail.
	 * GET|HEAD /subResourceDetails
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		

		$offset  = $request->page ? $request->page : 1;
		$limit   = $request->limit ? $request->limit : 12;

		$offset  = ($offset - 1) * $limit;
		
		if($request->resource_id){
			$subResourceDetails = SubResourceDetail::where('resource_id', $request->resource_id)->orderBy('id','desc')->offset($offset)->limit($limit)->get();
		}else{
			$subResourceDetails = SubResourceDetail::orderBy('id','desc')->offset($offset)->limit($limit)->get();;
		}
				
		return response()->json($subResourceDetails);
	}

	/**
	 * Show the form for creating a new SubResourceDetail.
	 * GET|HEAD /subResourceDetails/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created SubResourceDetail in storage.
	 * POST /subResourceDetails
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(SubResourceDetail::$rules) > 0)
			$this->validateRequestOrFail($request, SubResourceDetail::$rules);

		$input = $request->all();

		$input['objectId'] = str_random(10);

		$subResourceDetails = $this->subResourceDetailRepository->create($input);

		return $this->sendResponse($subResourceDetails->toArray(), "SubResourceDetail saved successfully");
	}

	/**
	 * Display the specified SubResourceDetail.
	 * GET|HEAD /subResourceDetails/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$subResourceDetail = $this->subResourceDetailRepository->apiFindOrFail($id);

		return $this->sendResponse($subResourceDetail->toArray(), "SubResourceDetail retrieved successfully");
	}

	/**
	 * Show the form for editing the specified SubResourceDetail.
	 * GET|HEAD /subResourceDetails/{id}/edit
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
	 * Update the specified SubResourceDetail in storage.
	 * PUT/PATCH /subResourceDetails/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var SubResourceDetail $subResourceDetail */
		$subResourceDetail = $this->subResourceDetailRepository->apiFindOrFail($id);

		$result = $this->subResourceDetailRepository->updateRich($input, $id);

		$subResourceDetail = $subResourceDetail->fresh();

		return $this->sendResponse($subResourceDetail->toArray(), "SubResourceDetail updated successfully");
	}

	/**
	 * Remove the specified SubResourceDetail from storage.
	 * DELETE /subResourceDetails/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->subResourceDetailRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "SubResourceDetail deleted successfully");
	}
}
