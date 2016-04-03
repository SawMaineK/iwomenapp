<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ShareUserRepository;
use App\Models\ShareUser;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class ShareUserAPIController extends AppBaseController
{
	/** @var  ShareUserRepository */
	private $shareUserRepository;

	function __construct(ShareUserRepository $shareUserRepo)
	{
		$this->shareUserRepository = $shareUserRepo;
	}

	/**
	 * Display a listing of the ShareUser.
	 * GET|HEAD /shareUsers
	 *
	 * @return Response
	 */
	public function index()
	{
		$shareUsers = $this->shareUserRepository->all();

		return $this->sendResponse($shareUsers->toArray(), "ShareUsers retrieved successfully");
	}

	/**
	 * Show the form for creating a new ShareUser.
	 * GET|HEAD /shareUsers/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created ShareUser in storage.
	 * POST /shareUsers
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(ShareUser::$rules) > 0)
			$this->validateRequestOrFail($request, ShareUser::$rules);

		$input = $request->all();

		$shareUsers = $this->shareUserRepository->create($input);

		return $this->sendResponse($shareUsers->toArray(), "ShareUser saved successfully");
	}

	/**
	 * Display the specified ShareUser.
	 * GET|HEAD /shareUsers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$shareUser = $this->shareUserRepository->apiFindOrFail($id);

		return $this->sendResponse($shareUser->toArray(), "ShareUser retrieved successfully");
	}

	/**
	 * Show the form for editing the specified ShareUser.
	 * GET|HEAD /shareUsers/{id}/edit
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
	 * Update the specified ShareUser in storage.
	 * PUT/PATCH /shareUsers/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var ShareUser $shareUser */
		$shareUser = $this->shareUserRepository->apiFindOrFail($id);

		$result = $this->shareUserRepository->updateRich($input, $id);

		$shareUser = $shareUser->fresh();

		return $this->sendResponse($shareUser->toArray(), "ShareUser updated successfully");
	}

	/**
	 * Remove the specified ShareUser from storage.
	 * DELETE /shareUsers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->shareUserRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "ShareUser deleted successfully");
	}
}
