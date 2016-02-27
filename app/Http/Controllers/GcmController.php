<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateGcmRequest;
use App\Http\Requests\UpdateGcmRequest;
use App\Libraries\Repositories\GcmRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class GcmController extends AppBaseController
{

	/** @var  GcmRepository */
	private $gcmRepository;

	function __construct(GcmRepository $gcmRepo)
	{
		$this->gcmRepository = $gcmRepo;
	}

	/**
	 * Display a listing of the Gcm.
	 *
	 * @return Response
	 */
	public function index()
	{
		$gcms = $this->gcmRepository->paginate(10);

		return view('gcms.index')
			->with('gcms', $gcms);
	}

	/**
	 * Show the form for creating a new Gcm.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('gcms.create');
	}

	/**
	 * Store a newly created Gcm in storage.
	 *
	 * @param CreateGcmRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateGcmRequest $request)
	{
		$input = $request->all();

		$gcm = $this->gcmRepository->create($input);

		Flash::success('Gcm saved successfully.');

		return redirect(route('gcms.index'));
	}

	/**
	 * Display the specified Gcm.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$gcm = $this->gcmRepository->find($id);

		if(empty($gcm))
		{
			Flash::error('Gcm not found');

			return redirect(route('gcms.index'));
		}

		return view('gcms.show')->with('gcm', $gcm);
	}

	/**
	 * Show the form for editing the specified Gcm.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$gcm = $this->gcmRepository->find($id);

		if(empty($gcm))
		{
			Flash::error('Gcm not found');

			return redirect(route('gcms.index'));
		}

		return view('gcms.edit')->with('gcm', $gcm);
	}

	/**
	 * Update the specified Gcm in storage.
	 *
	 * @param  int              $id
	 * @param UpdateGcmRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateGcmRequest $request)
	{
		$gcm = $this->gcmRepository->find($id);

		if(empty($gcm))
		{
			Flash::error('Gcm not found');

			return redirect(route('gcms.index'));
		}

		$this->gcmRepository->updateRich($request->all(), $id);

		Flash::success('Gcm updated successfully.');

		return redirect(route('gcms.index'));
	}

	/**
	 * Remove the specified Gcm from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$gcm = $this->gcmRepository->find($id);

		if(empty($gcm))
		{
			Flash::error('Gcm not found');

			return redirect(route('gcms.index'));
		}

		$this->gcmRepository->delete($id);

		Flash::success('Gcm deleted successfully.');

		return redirect(route('gcms.index'));
	}
}
