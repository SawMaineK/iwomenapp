<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateIWomenPostAudioRequest;
use App\Http\Requests\UpdateIWomenPostAudioRequest;
use App\Libraries\Repositories\IWomenPostAudioRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class IWomenPostAudioController extends AppBaseController
{

	/** @var  IWomenPostAudioRepository */
	private $iWomenPostAudioRepository;

	function __construct(IWomenPostAudioRepository $iWomenPostAudioRepo)
	{
		$this->iWomenPostAudioRepository = $iWomenPostAudioRepo;
	}

	/**
	 * Display a listing of the IWomenPostAudio.
	 *
	 * @return Response
	 */
	public function index()
	{
		$iWomenPostAudios = $this->iWomenPostAudioRepository->paginate(10);

		return view('iWomenPostAudios.index')
			->with('iWomenPostAudios', $iWomenPostAudios);
	}

	/**
	 * Show the form for creating a new IWomenPostAudio.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('iWomenPostAudios.create');
	}

	/**
	 * Store a newly created IWomenPostAudio in storage.
	 *
	 * @param CreateIWomenPostAudioRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateIWomenPostAudioRequest $request)
	{
		$input = $request->all();

		$iWomenPostAudio = $this->iWomenPostAudioRepository->create($input);

		Flash::success('IWomenPostAudio saved successfully.');

		return redirect(route('iWomenPostAudios.index'));
	}

	/**
	 * Display the specified IWomenPostAudio.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$iWomenPostAudio = $this->iWomenPostAudioRepository->find($id);

		if(empty($iWomenPostAudio))
		{
			Flash::error('IWomenPostAudio not found');

			return redirect(route('iWomenPostAudios.index'));
		}

		return view('iWomenPostAudios.show')->with('iWomenPostAudio', $iWomenPostAudio);
	}

	/**
	 * Show the form for editing the specified IWomenPostAudio.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$iWomenPostAudio = $this->iWomenPostAudioRepository->find($id);

		if(empty($iWomenPostAudio))
		{
			Flash::error('IWomenPostAudio not found');

			return redirect(route('iWomenPostAudios.index'));
		}

		return view('iWomenPostAudios.edit')->with('iWomenPostAudio', $iWomenPostAudio);
	}

	/**
	 * Update the specified IWomenPostAudio in storage.
	 *
	 * @param  int              $id
	 * @param UpdateIWomenPostAudioRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateIWomenPostAudioRequest $request)
	{
		$iWomenPostAudio = $this->iWomenPostAudioRepository->find($id);

		if(empty($iWomenPostAudio))
		{
			Flash::error('IWomenPostAudio not found');

			return redirect(route('iWomenPostAudios.index'));
		}

		$this->iWomenPostAudioRepository->updateRich($request->all(), $id);

		Flash::success('IWomenPostAudio updated successfully.');

		return redirect(route('iWomenPostAudios.index'));
	}

	/**
	 * Remove the specified IWomenPostAudio from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$iWomenPostAudio = $this->iWomenPostAudioRepository->find($id);

		if(empty($iWomenPostAudio))
		{
			Flash::error('IWomenPostAudio not found');

			return redirect(route('iWomenPostAudios.index'));
		}

		$this->iWomenPostAudioRepository->delete($id);

		Flash::success('IWomenPostAudio deleted successfully.');

		return redirect(route('iWomenPostAudios.index'));
	}
}
