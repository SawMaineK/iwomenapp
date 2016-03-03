<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\MutipleOptionRepository;
use App\Models\MutipleOption;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class MutipleOptionAPIController extends AppBaseController
{
	/** @var  MutipleOptionRepository */
	private $mutipleOptionRepository;

	function __construct(MutipleOptionRepository $mutipleOptionRepo)
	{
		$this->mutipleOptionRepository = $mutipleOptionRepo;
	}

	/**
	 * Display a listing of the MutipleOption.
	 * GET|HEAD /mutipleOptions
	 *
	 * @return Response
	 */
	public function index()
	{
		$mutipleOptions = $this->mutipleOptionRepository->all();

		return $this->sendResponse($mutipleOptions->toArray(), "MutipleOptions retrieved successfully");
	}

	/**
	 * Show the form for creating a new MutipleOption.
	 * GET|HEAD /mutipleOptions/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created MutipleOption in storage.
	 * POST /mutipleOptions
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(MutipleOption::$rules) > 0)
			$this->validateRequestOrFail($request, MutipleOption::$rules);

		$input = $request->all();

		$mutipleOptions = $this->mutipleOptionRepository->create($input);

		return $this->sendResponse($mutipleOptions->toArray(), "MutipleOption saved successfully");
	}

	/**
	 * Display the specified MutipleOption.
	 * GET|HEAD /mutipleOptions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$mutipleOption = $this->mutipleOptionRepository->apiFindOrFail($id);

		return $this->sendResponse($mutipleOption->toArray(), "MutipleOption retrieved successfully");
	}

	/**
	 * Show the form for editing the specified MutipleOption.
	 * GET|HEAD /mutipleOptions/{id}/edit
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
	 * Update the specified MutipleOption in storage.
	 * PUT/PATCH /mutipleOptions/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var MutipleOption $mutipleOption */
		$mutipleOption = $this->mutipleOptionRepository->apiFindOrFail($id);

		$result = $this->mutipleOptionRepository->updateRich($input, $id);

		$mutipleOption = $mutipleOption->fresh();

		return $this->sendResponse($mutipleOption->toArray(), "MutipleOption updated successfully");
	}

	/**
	 * Remove the specified MutipleOption from storage.
	 * DELETE /mutipleOptions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->mutipleOptionRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "MutipleOption deleted successfully");
	}
}
