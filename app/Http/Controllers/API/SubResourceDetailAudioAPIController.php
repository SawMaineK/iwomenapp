<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\SubResourceDetailAudioRepository;
use App\Models\SubResourceDetailAudio;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class SubResourceDetailAudioAPIController extends AppBaseController
{
	/** @var  SubResourceDetailAudioRepository */
	private $subResourceDetailAudioRepository;

	function __construct(SubResourceDetailAudioRepository $subResourceDetailAudioRepo)
	{
		$this->subResourceDetailAudioRepository = $subResourceDetailAudioRepo;
	}

	/**
	 * Display a listing of the SubResourceDetailAudio.
	 * GET|HEAD /subResourceDetailAudios
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$offset  = $request->page ? $request->page : 1;
		$limit   = $request->limit ? $request->limit : 12;
		$sorting = $request->sorting ? $request->sorting : 'asc';
		$isAllow = $request->isAllow ? $request->isAllow : '';
		$postId = $request->post_id ? $request->post_id : '';
		
		$offset  = ($offset - 1) * $limit;
		if($postId != '')
		{
			if($isAllow && $isAllow != '')
				$postAudio = SubResourceDetailAudio::where('post_id', $postId)->where('isAllow',$isAllow)->orderBy('uploaded_date', $sorting)->offset($offset)->limit($limit)->get();
			else
				$postAudio = SubResourceDetailAudio::where('post_id', $postId)->orderBy('uploaded_date', $sorting)->offset($offset)->limit($limit)->get();
		}else{
			if($isAllow && $isAllow != '')
				$postAudio = SubResourceDetailAudio::where('isAllow',$isAllow)->orderBy('uploaded_date', $sorting)->offset($offset)->limit($limit)->get();
			else
				$postAudio = SubResourceDetailAudio::orderBy('uploaded_date', $sorting)->offset($offset)->limit($limit)->get();
		}
		
		
		return response()->json($postAudio);
	
	}

	/**
	 * Show the form for creating a new SubResourceDetailAudio.
	 * GET|HEAD /subResourceDetailAudios/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created SubResourceDetailAudio in storage.
	 * POST /subResourceDetailAudios
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(SubResourceDetailAudio::$rules) > 0)
			$this->validateRequestOrFail($request, SubResourceDetailAudio::$rules);

		$input = $request->all();

		$subResourceDetailAudios = $this->subResourceDetailAudioRepository->create($input);

		return $this->sendResponse($subResourceDetailAudios->toArray(), "SubResourceDetailAudio saved successfully");
	}

	/**
	 * Display the specified SubResourceDetailAudio.
	 * GET|HEAD /subResourceDetailAudios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$subResourceDetailAudio = $this->subResourceDetailAudioRepository->apiFindOrFail($id);

		return $this->sendResponse($subResourceDetailAudio->toArray(), "SubResourceDetailAudio retrieved successfully");
	}

	/**
	 * Show the form for editing the specified SubResourceDetailAudio.
	 * GET|HEAD /subResourceDetailAudios/{id}/edit
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
	 * Update the specified SubResourceDetailAudio in storage.
	 * PUT/PATCH /subResourceDetailAudios/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var SubResourceDetailAudio $subResourceDetailAudio */
		$subResourceDetailAudio = $this->subResourceDetailAudioRepository->apiFindOrFail($id);

		$result = $this->subResourceDetailAudioRepository->updateRich($input, $id);

		$subResourceDetailAudio = $subResourceDetailAudio->fresh();

		return $this->sendResponse($subResourceDetailAudio->toArray(), "SubResourceDetailAudio updated successfully");
	}

	/**
	 * Remove the specified SubResourceDetailAudio from storage.
	 * DELETE /subResourceDetailAudios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->subResourceDetailAudioRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "SubResourceDetailAudio deleted successfully");
	}
}
