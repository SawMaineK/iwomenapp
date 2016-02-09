<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\TlgProfileRepository;
use App\Models\TlgProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class TlgProfileAPIController extends AppBaseController
{
	/** @var  TlgProfileRepository */
	private $tlgProfileRepository;

	function __construct(TlgProfileRepository $tlgProfileRepo)
	{
		$this->tlgProfileRepository = $tlgProfileRepo;
	}

	/**
	 * Display a listing of the TlgProfile.
	 * GET|HEAD /tlgProfiles
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		if($request->per_page)
			$tlgProfiles = $this->tlgProfileRepository->paginate($request->per_page);
		else
			$tlgProfiles = $this->tlgProfileRepository->all();
		return response()->json($tlgProfiles);
	}

	/**
	 * Show the form for creating a new TlgProfile.
	 * GET|HEAD /tlgProfiles/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created TlgProfile in storage.
	 * POST /tlgProfiles
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(TlgProfile::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, TlgProfile::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$input['objectId'] = str_random(10);

		$tlgProfiles = $this->tlgProfileRepository->create($input);

		return $this->sendResponse($tlgProfiles->toArray(), "TlgProfile saved successfully");
	}

	/**
	 * Display the specified TlgProfile.
	 * GET|HEAD /tlgProfiles/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tlgProfile = $this->tlgProfileRepository->apiFindOrFail($id);

		return $this->sendResponse($tlgProfile->toArray(), "TlgProfile retrieved successfully");
	}

	/**
	 * Show the form for editing the specified TlgProfile.
	 * GET|HEAD /tlgProfiles/{id}/edit
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
	 * Update the specified TlgProfile in storage.
	 * PUT/PATCH /tlgProfiles/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var TlgProfile $tlgProfile */
		$tlgProfile = $this->tlgProfileRepository->apiFindOrFail($id);

		$result = $this->tlgProfileRepository->updateRich($input, $id);

		$tlgProfile = $tlgProfile->fresh();

		return $this->sendResponse($tlgProfile->toArray(), "TlgProfile updated successfully");
	}

	/**
	 * Remove the specified TlgProfile from storage.
	 * DELETE /tlgProfiles/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->tlgProfileRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "TlgProfile deleted successfully");
	}
}
