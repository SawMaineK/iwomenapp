<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\PointPriceRepository;
use App\Models\PointPrice;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class PointPriceAPIController extends AppBaseController
{
	/** @var  PointPriceRepository */
	private $pointPriceRepository;

	function __construct(PointPriceRepository $pointPriceRepo)
	{
		$this->pointPriceRepository = $pointPriceRepo;
	}

	/**
	 * Display a listing of the PointPrice.
	 * GET|HEAD /pointPrices
	 *
	 * @return Response
	 */
	public function index()
	{
		$pointPrices = $this->pointPriceRepository->all();

		return response()->json($pointPrices);
	}

	/**
	 * Show the form for creating a new PointPrice.
	 * GET|HEAD /pointPrices/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created PointPrice in storage.
	 * POST /pointPrices
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(PointPrice::$rules) > 0)
			$this->validateRequestOrFail($request, PointPrice::$rules);

		$input = $request->all();

		$pointPrices = $this->pointPriceRepository->create($input);

		return $this->sendResponse($pointPrices->toArray(), "PointPrice saved successfully");
	}

	/**
	 * Display the specified PointPrice.
	 * GET|HEAD /pointPrices/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$pointPrice = $this->pointPriceRepository->apiFindOrFail($id);

		return $this->sendResponse($pointPrice->toArray(), "PointPrice retrieved successfully");
	}

	/**
	 * Show the form for editing the specified PointPrice.
	 * GET|HEAD /pointPrices/{id}/edit
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
	 * Update the specified PointPrice in storage.
	 * PUT/PATCH /pointPrices/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var PointPrice $pointPrice */
		$pointPrice = $this->pointPriceRepository->apiFindOrFail($id);

		$result = $this->pointPriceRepository->updateRich($input, $id);

		$pointPrice = $pointPrice->fresh();

		return $this->sendResponse($pointPrice->toArray(), "PointPrice updated successfully");
	}

	/**
	 * Remove the specified PointPrice from storage.
	 * DELETE /pointPrices/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->pointPriceRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "PointPrice deleted successfully");
	}
}
