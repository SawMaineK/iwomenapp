<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePointPriceRequest;
use App\Http\Requests\UpdatePointPriceRequest;
use App\Libraries\Repositories\PointPriceRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PointPriceController extends AppBaseController
{

	/** @var  PointPriceRepository */
	private $pointPriceRepository;

	function __construct(PointPriceRepository $pointPriceRepo)
	{
		$this->pointPriceRepository = $pointPriceRepo;
	}

	/**
	 * Display a listing of the PointPrice.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pointPrices = $this->pointPriceRepository->paginate(10);

		return view('pointPrices.index')
			->with('pointPrices', $pointPrices);
	}

	/**
	 * Show the form for creating a new PointPrice.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('pointPrices.create');
	}

	/**
	 * Store a newly created PointPrice in storage.
	 *
	 * @param CreatePointPriceRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePointPriceRequest $request)
	{
		$input = $request->all();

		$pointPrice = $this->pointPriceRepository->create($input);

		Flash::success('PointPrice saved successfully.');

		return redirect(route('pointPrices.index'));
	}

	/**
	 * Display the specified PointPrice.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$pointPrice = $this->pointPriceRepository->find($id);

		if(empty($pointPrice))
		{
			Flash::error('PointPrice not found');

			return redirect(route('pointPrices.index'));
		}

		return view('pointPrices.show')->with('pointPrice', $pointPrice);
	}

	/**
	 * Show the form for editing the specified PointPrice.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$pointPrice = $this->pointPriceRepository->find($id);

		if(empty($pointPrice))
		{
			Flash::error('PointPrice not found');

			return redirect(route('pointPrices.index'));
		}

		return view('pointPrices.edit')->with('pointPrice', $pointPrice);
	}

	/**
	 * Update the specified PointPrice in storage.
	 *
	 * @param  int              $id
	 * @param UpdatePointPriceRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatePointPriceRequest $request)
	{
		$pointPrice = $this->pointPriceRepository->find($id);

		if(empty($pointPrice))
		{
			Flash::error('PointPrice not found');

			return redirect(route('pointPrices.index'));
		}

		$this->pointPriceRepository->updateRich($request->all(), $id);

		Flash::success('PointPrice updated successfully.');

		return redirect(route('pointPrices.index'));
	}

	/**
	 * Remove the specified PointPrice from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$pointPrice = $this->pointPriceRepository->find($id);

		if(empty($pointPrice))
		{
			Flash::error('PointPrice not found');

			return redirect(route('pointPrices.index'));
		}

		$this->pointPriceRepository->delete($id);

		Flash::success('PointPrice deleted successfully.');

		return redirect(route('pointPrices.index'));
	}
}
