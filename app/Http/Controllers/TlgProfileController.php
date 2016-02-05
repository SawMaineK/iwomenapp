<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateTlgProfileRequest;
use App\Http\Requests\UpdateTlgProfileRequest;
use App\Libraries\Repositories\TlgProfileRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class TlgProfileController extends AppBaseController
{

	/** @var  TlgProfileRepository */
	private $tlgProfileRepository;

	function __construct(TlgProfileRepository $tlgProfileRepo)
	{
		$this->tlgProfileRepository = $tlgProfileRepo;
	}

	/**
	 * Display a listing of the TlgProfile.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tlgProfiles = $this->tlgProfileRepository->paginate(10);

		return view('tlgProfiles.index')
			->with('tlgProfiles', $tlgProfiles);
	}

	/**
	 * Show the form for creating a new TlgProfile.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tlgProfiles.create');
	}

	/**
	 * Store a newly created TlgProfile in storage.
	 *
	 * @param CreateTlgProfileRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTlgProfileRequest $request)
	{
		$input = $request->all();

		$tlgProfile = $this->tlgProfileRepository->create($input);

		Flash::success('TlgProfile saved successfully.');

		return redirect(route('tlgProfiles.index'));
	}

	/**
	 * Display the specified TlgProfile.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tlgProfile = $this->tlgProfileRepository->find($id);

		if(empty($tlgProfile))
		{
			Flash::error('TlgProfile not found');

			return redirect(route('tlgProfiles.index'));
		}

		return view('tlgProfiles.show')->with('tlgProfile', $tlgProfile);
	}

	/**
	 * Show the form for editing the specified TlgProfile.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$tlgProfile = $this->tlgProfileRepository->find($id);

		if(empty($tlgProfile))
		{
			Flash::error('TlgProfile not found');

			return redirect(route('tlgProfiles.index'));
		}

		return view('tlgProfiles.edit')->with('tlgProfile', $tlgProfile);
	}

	/**
	 * Update the specified TlgProfile in storage.
	 *
	 * @param  int              $id
	 * @param UpdateTlgProfileRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateTlgProfileRequest $request)
	{
		$tlgProfile = $this->tlgProfileRepository->find($id);

		if(empty($tlgProfile))
		{
			Flash::error('TlgProfile not found');

			return redirect(route('tlgProfiles.index'));
		}

		$this->tlgProfileRepository->updateRich($request->all(), $id);

		Flash::success('TlgProfile updated successfully.');

		return redirect(route('tlgProfiles.index'));
	}

	/**
	 * Remove the specified TlgProfile from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$tlgProfile = $this->tlgProfileRepository->find($id);

		if(empty($tlgProfile))
		{
			Flash::error('TlgProfile not found');

			return redirect(route('tlgProfiles.index'));
		}

		$this->tlgProfileRepository->delete($id);

		Flash::success('TlgProfile deleted successfully.');

		return redirect(route('tlgProfiles.index'));
	}
}
