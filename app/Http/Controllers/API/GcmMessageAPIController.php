<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\GcmMessageRepository;
use App\Models\GcmMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class GcmMessageAPIController extends AppBaseController
{
	/** @var  GcmMessageRepository */
	private $gcmMessageRepository;

	function __construct(GcmMessageRepository $gcmMessageRepo)
	{
		$this->gcmMessageRepository = $gcmMessageRepo;
	}

	/**
	 * Display a listing of the GcmMessage.
	 * GET|HEAD /gcmMessages
	 *
	 * @return Response
	 */
	public function index()
	{
		$gcmMessages = $this->gcmMessageRepository->all();

		return $this->sendResponse($gcmMessages->toArray(), "GcmMessages retrieved successfully");
	}

	/**
	 * Show the form for creating a new GcmMessage.
	 * GET|HEAD /gcmMessages/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created GcmMessage in storage.
	 * POST /gcmMessages
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(GcmMessage::$rules) > 0)
			$this->validateRequestOrFail($request, GcmMessage::$rules);

		$input = $request->all();

		$gcmMessages = $this->gcmMessageRepository->create($input);

		return $this->sendResponse($gcmMessages->toArray(), "GcmMessage saved successfully");
	}

	/**
	 * Display the specified GcmMessage.
	 * GET|HEAD /gcmMessages/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$gcmMessage = $this->gcmMessageRepository->apiFindOrFail($id);

		return $this->sendResponse($gcmMessage->toArray(), "GcmMessage retrieved successfully");
	}

	/**
	 * Show the form for editing the specified GcmMessage.
	 * GET|HEAD /gcmMessages/{id}/edit
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
	 * Update the specified GcmMessage in storage.
	 * PUT/PATCH /gcmMessages/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var GcmMessage $gcmMessage */
		$gcmMessage = $this->gcmMessageRepository->apiFindOrFail($id);

		$result = $this->gcmMessageRepository->updateRich($input, $id);

		$gcmMessage = $gcmMessage->fresh();

		return $this->sendResponse($gcmMessage->toArray(), "GcmMessage updated successfully");
	}

	/**
	 * Remove the specified GcmMessage from storage.
	 * DELETE /gcmMessages/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->gcmMessageRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "GcmMessage deleted successfully");
	}
}
