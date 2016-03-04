<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSisterDownloadAppRequest;
use App\Http\Requests\UpdateSisterDownloadAppRequest;
use App\Libraries\Repositories\SisterDownloadAppRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class SisterDownloadAppController extends AppBaseController
{

	/** @var  SisterDownloadAppRepository */
	private $sisterDownloadAppRepository;

	function __construct(SisterDownloadAppRepository $sisterDownloadAppRepo)
	{
		$this->sisterDownloadAppRepository = $sisterDownloadAppRepo;
	}

	/**
	 * Display a listing of the SisterDownloadApp.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sisterDownloadApps = $this->sisterDownloadAppRepository->paginate(10);

		return view('sisterDownloadApps.index')
			->with('sisterDownloadApps', $sisterDownloadApps);
	}

	/**
	 * Show the form for creating a new SisterDownloadApp.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('sisterDownloadApps.create');
	}

	/**
	 * Store a newly created SisterDownloadApp in storage.
	 *
	 * @param CreateSisterDownloadAppRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSisterDownloadAppRequest $request)
	{
		$input = $request->all();

		$input['objectId'] = str_random(10);

		$sisterDownloadApp = $this->sisterDownloadAppRepository->create($input);

		Flash::success('SisterDownloadApp saved successfully.');

		return redirect(route('sisterDownloadApps.index'));
	}

	/**
	 * Display the specified SisterDownloadApp.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$sisterDownloadApp = $this->sisterDownloadAppRepository->find($id);

		if(empty($sisterDownloadApp))
		{
			Flash::error('SisterDownloadApp not found');

			return redirect(route('sisterDownloadApps.index'));
		}

		return view('sisterDownloadApps.show')->with('sisterDownloadApp', $sisterDownloadApp);
	}

	/**
	 * Show the form for editing the specified SisterDownloadApp.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$sisterDownloadApp = $this->sisterDownloadAppRepository->find($id);

		if(empty($sisterDownloadApp))
		{
			Flash::error('SisterDownloadApp not found');

			return redirect(route('sisterDownloadApps.index'));
		}

		return view('sisterDownloadApps.edit')->with('sisterDownloadApp', $sisterDownloadApp);
	}

	/**
	 * Update the specified SisterDownloadApp in storage.
	 *
	 * @param  int              $id
	 * @param UpdateSisterDownloadAppRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateSisterDownloadAppRequest $request)
	{
		$sisterDownloadApp = $this->sisterDownloadAppRepository->find($id);

		if(empty($sisterDownloadApp))
		{
			Flash::error('SisterDownloadApp not found');

			return redirect(route('sisterDownloadApps.index'));
		}

		$this->sisterDownloadAppRepository->updateRich($request->all(), $id);

		Flash::success('SisterDownloadApp updated successfully.');

		return redirect(route('sisterDownloadApps.index'));
	}

	/**
	 * Remove the specified SisterDownloadApp from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$sisterDownloadApp = $this->sisterDownloadAppRepository->find($id);

		if(empty($sisterDownloadApp))
		{
			Flash::error('SisterDownloadApp not found');

			return redirect(route('sisterDownloadApps.index'));
		}

		$this->sisterDownloadAppRepository->delete($id);

		Flash::success('SisterDownloadApp deleted successfully.');

		return redirect(route('sisterDownloadApps.index'));
	}
}
