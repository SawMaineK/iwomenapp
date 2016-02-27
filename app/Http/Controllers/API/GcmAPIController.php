<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\GcmRepository;
use App\Models\Gcm;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class GcmAPIController extends AppBaseController
{
	/** @var  GcmRepository */
	private $gcmRepository;

	function __construct(GcmRepository $gcmRepo)
	{
		$this->gcmRepository = $gcmRepo;
	}

	/**
	 * Display a listing of the Gcm.
	 * GET|HEAD /gcms
	 *
	 * @return Response
	 */
	public function index()
	{
		$gcms = $this->gcmRepository->all();

		return $this->sendResponse($gcms->toArray(), "Gcms retrieved successfully");
	}

	/**
	 * Show the form for creating a new Gcm.
	 * GET|HEAD /gcms/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Gcm in storage.
	 * POST /gcms
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Gcm::$rules) > 0)
			$this->validateRequestOrFail($request, Gcm::$rules);

		$input = $request->all();

		$gcms = $this->gcmRepository->create($input);

		return $this->sendResponse($gcms->toArray(), "Gcm saved successfully");
	}

	/**
	 * Display the specified Gcm.
	 * GET|HEAD /gcms/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$gcm = $this->gcmRepository->apiFindOrFail($id);

		return $this->sendResponse($gcm->toArray(), "Gcm retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Gcm.
	 * GET|HEAD /gcms/{id}/edit
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
	 * Update the specified Gcm in storage.
	 * PUT/PATCH /gcms/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Gcm $gcm */
		$gcm = $this->gcmRepository->apiFindOrFail($id);

		$result = $this->gcmRepository->updateRich($input, $id);

		$gcm = $gcm->fresh();

		return $this->sendResponse($gcm->toArray(), "Gcm updated successfully");
	}

	/**
	 * Remove the specified Gcm from storage.
	 * DELETE /gcms/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->gcmRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Gcm deleted successfully");
	}
}
