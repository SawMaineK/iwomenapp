<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ApkRepository;
use App\Models\Apk;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class ApkAPIController extends AppBaseController
{
	/** @var  ApkRepository */
	private $apkRepository;

	function __construct(ApkRepository $apkRepo)
	{
		$this->apkRepository = $apkRepo;
	}

	/**
	 * Display a listing of the Apk.
	 * GET|HEAD /apks
	 *
	 * @return Response
	 */
	public function index()
	{
		$apks = $this->apkRepository->all();

		return $this->sendResponse($apks->toArray(), "Apks retrieved successfully");
	}

	/**
	 * Show the form for creating a new Apk.
	 * GET|HEAD /apks/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Apk in storage.
	 * POST /apks
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Apk::$rules) > 0)
			$this->validateRequestOrFail($request, Apk::$rules);

		$input = $request->all();

		$apks = $this->apkRepository->create($input);

		return $this->sendResponse($apks->toArray(), "Apk saved successfully");
	}

	/**
	 * Display the specified Apk.
	 * GET|HEAD /apks/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$apk = $this->apkRepository->apiFindOrFail($id);

		return $this->sendResponse($apk->toArray(), "Apk retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Apk.
	 * GET|HEAD /apks/{id}/edit
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
	 * Update the specified Apk in storage.
	 * PUT/PATCH /apks/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Apk $apk */
		$apk = $this->apkRepository->apiFindOrFail($id);

		$result = $this->apkRepository->updateRich($input, $id);

		$apk = $apk->fresh();

		return $this->sendResponse($apk->toArray(), "Apk updated successfully");
	}

	/**
	 * Remove the specified Apk from storage.
	 * DELETE /apks/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->apkRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Apk deleted successfully");
	}
}
