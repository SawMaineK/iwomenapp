<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\AvatorRepository;
use App\Models\Avator;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class AvatorAPIController extends AppBaseController
{
	/** @var  AvatorRepository */
	private $avatorRepository;

	function __construct(AvatorRepository $avatorRepo)
	{
		$this->avatorRepository = $avatorRepo;
	}

	/**
	 * Display a listing of the Avator.
	 * GET|HEAD /avators
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$offset  = $request->page ? $request->page : 1;
		$limit   = $request->limit ? $request->limit : 12;

		$offset  = ($offset - 1) * $limit;
		
		$avators = Avator::orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($avators);
	}

	/**
	 * Show the form for creating a new Avator.
	 * GET|HEAD /avators/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Avator in storage.
	 * POST /avators
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Avator::$rules) > 0)
			$this->validateRequestOrFail($request, Avator::$rules);

		$input = $request->all();

		$input['objectId'] = str_random(10);

		$avators = $this->avatorRepository->create($input);

		return $this->sendResponse($avators->toArray(), "Avator saved successfully");
	}

	/**
	 * Display the specified Avator.
	 * GET|HEAD /avators/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$avator = $this->avatorRepository->apiFindOrFail($id);

		return $this->sendResponse($avator->toArray(), "Avator retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Avator.
	 * GET|HEAD /avators/{id}/edit
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
	 * Update the specified Avator in storage.
	 * PUT/PATCH /avators/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Avator $avator */
		$avator = $this->avatorRepository->apiFindOrFail($id);

		$result = $this->avatorRepository->updateRich($input, $id);

		$avator = $avator->fresh();

		return $this->sendResponse($avator->toArray(), "Avator updated successfully");
	}

	/**
	 * Remove the specified Avator from storage.
	 * DELETE /avators/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->avatorRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Avator deleted successfully");
	}
}
