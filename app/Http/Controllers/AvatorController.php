<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAvatorRequest;
use App\Http\Requests\UpdateAvatorRequest;
use App\Libraries\Repositories\AvatorRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class AvatorController extends AppBaseController
{

	/** @var  AvatorRepository */
	private $avatorRepository;

	function __construct(AvatorRepository $avatorRepo)
	{
		$this->avatorRepository = $avatorRepo;
	}

	/**
	 * Display a listing of the Avator.
	 *
	 * @return Response
	 */
	public function index()
	{
		$avators = $this->avatorRepository->paginate(10);

		return view('avators.index')
			->with('avators', $avators);
	}

	/**
	 * Show the form for creating a new Avator.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('avators.create');
	}

	/**
	 * Store a newly created Avator in storage.
	 *
	 * @param CreateAvatorRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateAvatorRequest $request)
	{
		$input = $request->all();

		$input['objectId'] = str_random(10);

		if($request->file('avatorImg')){
			$uploadImage = $this->uploadImage($request->file('avatorImg'),'/stickers_photo/');
			$input['avatorImg'] = $uploadImage['resize_url'][0];
		}

		$avator = $this->avatorRepository->create($input);

		Flash::success('Avator saved successfully.');

		return redirect(route('avators.index'));
	}

	/**
	 * Display the specified Avator.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$avator = $this->avatorRepository->find($id);

		if(empty($avator))
		{
			Flash::error('Avator not found');

			return redirect(route('avators.index'));
		}

		return view('avators.show')->with('avator', $avator);
	}

	/**
	 * Show the form for editing the specified Avator.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$avator = $this->avatorRepository->find($id);

		if(empty($avator))
		{
			Flash::error('Avator not found');

			return redirect(route('avators.index'));
		}

		return view('avators.edit')->with('avator', $avator);
	}

	/**
	 * Update the specified Avator in storage.
	 *
	 * @param  int              $id
	 * @param UpdateAvatorRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateAvatorRequest $request)
	{
		$avator = $this->avatorRepository->find($id);

		if(empty($avator))
		{
			Flash::error('Avator not found');

			return redirect(route('avators.index'));
		}

		if($request->file('avatorImg')){
			$uploadImage = $this->uploadImage($request->file('avatorImg'),'/stickers_photo/');
			$input['avatorImg'] = $uploadImage['resize_url'][0];
		}

		$this->avatorRepository->updateRich($request->all(), $id);

		Flash::success('Avator updated successfully.');

		return redirect(route('avators.index'));
	}

	/**
	 * Remove the specified Avator from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$avator = $this->avatorRepository->find($id);

		if(empty($avator))
		{
			Flash::error('Avator not found');

			return redirect(route('avators.index'));
		}

		$this->avatorRepository->delete($id);

		Flash::success('Avator deleted successfully.');

		return redirect(route('avators.index'));
	}
}
