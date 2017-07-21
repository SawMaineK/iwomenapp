<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSubResourceDetailAudioRequest;
use App\Http\Requests\UpdateSubResourceDetailAudioRequest;
use App\Libraries\Repositories\SubResourceDetailAudioRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class SubResourceDetailAudioController extends AppBaseController
{

	/** @var  SubResourceDetailAudioRepository */
	private $subResourceDetailAudioRepository;

	function __construct(SubResourceDetailAudioRepository $subResourceDetailAudioRepo)
	{
		$this->subResourceDetailAudioRepository = $subResourceDetailAudioRepo;
	}

	/**
	 * Display a listing of the SubResourceDetailAudio.
	 *
	 * @return Response
	 */
	public function index()
	{
		$subResourceDetailAudios = $this->subResourceDetailAudioRepository->paginate(10);

		return view('subResourceDetailAudios.index')
			->with('subResourceDetailAudios', $subResourceDetailAudios);
	}

	/**
	 * Show the form for creating a new SubResourceDetailAudio.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('subResourceDetailAudios.create');
	}

	/**
	 * Store a newly created SubResourceDetailAudio in storage.
	 *
	 * @param CreateSubResourceDetailAudioRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSubResourceDetailAudioRequest $request)
	{
		$input = $request->all();

		$subResourceDetailAudio = $this->subResourceDetailAudioRepository->create($input);

		Flash::success('SubResourceDetailAudio saved successfully.');

		return redirect(route('subResourceDetailAudios.index'));
	}

	/**
	 * Display the specified SubResourceDetailAudio.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$subResourceDetailAudio = $this->subResourceDetailAudioRepository->find($id);

		if(empty($subResourceDetailAudio))
		{
			Flash::error('SubResourceDetailAudio not found');

			return redirect(route('subResourceDetailAudios.index'));
		}

		return view('subResourceDetailAudios.show')->with('subResourceDetailAudio', $subResourceDetailAudio);
	}

	/**
	 * Show the form for editing the specified SubResourceDetailAudio.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$subResourceDetailAudio = $this->subResourceDetailAudioRepository->find($id);

		if(empty($subResourceDetailAudio))
		{
			Flash::error('SubResourceDetailAudio not found');

			return redirect(route('subResourceDetailAudios.index'));
		}

		return view('subResourceDetailAudios.edit')->with('subResourceDetailAudio', $subResourceDetailAudio);
	}

	/**
	 * Update the specified SubResourceDetailAudio in storage.
	 *
	 * @param  int              $id
	 * @param UpdateSubResourceDetailAudioRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateSubResourceDetailAudioRequest $request)
	{
		$subResourceDetailAudio = $this->subResourceDetailAudioRepository->find($id);

		if(empty($subResourceDetailAudio))
		{
			Flash::error('SubResourceDetailAudio not found');

			return redirect(route('subResourceDetailAudios.index'));
		}

		$this->subResourceDetailAudioRepository->updateRich($request->all(), $id);

		Flash::success('SubResourceDetailAudio updated successfully.');

		return redirect(route('subResourceDetailAudios.index'));
	}

	/**
	 * Remove the specified SubResourceDetailAudio from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$subResourceDetailAudio = $this->subResourceDetailAudioRepository->find($id);

		if(empty($subResourceDetailAudio))
		{
			Flash::error('SubResourceDetailAudio not found');

			return redirect(route('subResourceDetailAudios.index'));
		}

		$this->subResourceDetailAudioRepository->delete($id);

		Flash::success('SubResourceDetailAudio deleted successfully.');

		return redirect(route('subResourceDetailAudios.index'));
	}
}
