<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\IWomenPostAudioRepository;
use App\Models\IWomenPostAudio;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class IWomenPostAudioAPIController extends AppBaseController
{
	/** @var  IWomenPostAudioRepository */
	private $iWomenPostAudioRepository;

	function __construct(IWomenPostAudioRepository $iWomenPostAudioRepo)
	{
		$this->iWomenPostAudioRepository = $iWomenPostAudioRepo;
	}

	/**
	 * Display a listing of the IWomenPostAudio.
	 * GET|HEAD /iWomenPostAudios
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$offset  = $request->page ? $request->page : 1;
		$limit   = $request->limit ? $request->limit : 12;
		$sorting = $request->sorting ? $request->sorting : 'asc';
		$isAllow = $request->isAllow ? $request->isAllow : '';
		
		$offset  = ($offset - 1) * $limit;
		if($isAllow && $isAllow != '')
			$postAudio = IWomenPostAudio::where('isAllow',$isAllow)->orderBy('uploaded_date', $sorting)->offset($offset)->limit($limit)->get();
		else
			$postAudio = IWomenPostAudio::orderBy('uploaded_date', $sorting)->offset($offset)->limit($limit)->get();
		
		return response()->json($postAudio);
	}

	/**
	 * Show the form for creating a new IWomenPostAudio.
	 * GET|HEAD /iWomenPostAudios/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created IWomenPostAudio in storage.
	 * POST /iWomenPostAudios
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(IWomenPostAudio::$rules) > 0)
			$this->validateRequestOrFail($request, IWomenPostAudio::$rules);

		$input = $request->all();

		$iWomenPostAudios = $this->iWomenPostAudioRepository->create($input);

		return $this->sendResponse($iWomenPostAudios->toArray(), "IWomenPostAudio saved successfully");
	}

	/**
	 * Display the specified IWomenPostAudio.
	 * GET|HEAD /iWomenPostAudios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$iWomenPostAudio = $this->iWomenPostAudioRepository->apiFindOrFail($id);

		return $this->sendResponse($iWomenPostAudio->toArray(), "IWomenPostAudio retrieved successfully");
	}

	/**
	 * Show the form for editing the specified IWomenPostAudio.
	 * GET|HEAD /iWomenPostAudios/{id}/edit
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
	 * Update the specified IWomenPostAudio in storage.
	 * PUT/PATCH /iWomenPostAudios/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var IWomenPostAudio $iWomenPostAudio */
		$iWomenPostAudio = $this->iWomenPostAudioRepository->apiFindOrFail($id);

		$result = $this->iWomenPostAudioRepository->updateRich($input, $id);

		$iWomenPostAudio = $iWomenPostAudio->fresh();

		return $this->sendResponse($iWomenPostAudio->toArray(), "IWomenPostAudio updated successfully");
	}

	/**
	 * Remove the specified IWomenPostAudio from storage.
	 * DELETE /iWomenPostAudios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->iWomenPostAudioRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "IWomenPostAudio deleted successfully");
	}
}
