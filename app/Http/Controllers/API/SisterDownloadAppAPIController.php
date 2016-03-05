<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\SisterDownloadAppRepository;
use App\Models\SisterDownloadApp;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class SisterDownloadAppAPIController extends AppBaseController
{
	/** @var  SisterDownloadAppRepository */
	private $sisterDownloadAppRepository;

	function __construct(SisterDownloadAppRepository $sisterDownloadAppRepo)
	{
		$this->sisterDownloadAppRepository = $sisterDownloadAppRepo;
	}

	/**
	 * Display a listing of the SisterDownloadApp.
	 * GET|HEAD /sisterDownloadApps
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$offset  = $request->page ? $request->page : 1;
		$limit   = $request->limit ? $request->limit : 12;
		$isAllow = $request->isAllow ? $request->isAllow : '';

		$offset  = ($offset - 1) * $limit;
		
		if($isAllow && $isAllow != ''){
			$posts = SisterDownloadApp::where('isAllow',$isAllow)->orderBy('id','desc')->offset($offset)->limit($limit)->get();
		}
		else{
			$posts = SisterDownloadApp::orderBy('id','desc')->offset($offset)->limit($limit)->get();
		}
				
		return response()->json($posts);
	}

	/**
	 * Show the form for creating a new SisterDownloadApp.
	 * GET|HEAD /sisterDownloadApps/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created SisterDownloadApp in storage.
	 * POST /sisterDownloadApps
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(SisterDownloadApp::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, SisterDownloadApp::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$input['objectId'] = str_random(10);

		$sisterDownloadApps = $this->sisterDownloadAppRepository->create($input);

		return $this->sendResponse($sisterDownloadApps->toArray(), "SisterDownloadApp saved successfully");
	}

	/**
	 * Display the specified SisterDownloadApp.
	 * GET|HEAD /sisterDownloadApps/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$sisterDownloadApp = $this->sisterDownloadAppRepository->apiFindOrFail($id);

		return $this->sendResponse($sisterDownloadApp->toArray(), "SisterDownloadApp retrieved successfully");
	}

	/**
	 * Show the form for editing the specified SisterDownloadApp.
	 * GET|HEAD /sisterDownloadApps/{id}/edit
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
	 * Update the specified SisterDownloadApp in storage.
	 * PUT/PATCH /sisterDownloadApps/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var SisterDownloadApp $sisterDownloadApp */
		$sisterDownloadApp = $this->sisterDownloadAppRepository->apiFindOrFail($id);

		$result = $this->sisterDownloadAppRepository->updateRich($input, $id);

		$sisterDownloadApp = $sisterDownloadApp->fresh();

		return $this->sendResponse($sisterDownloadApp->toArray(), "SisterDownloadApp updated successfully");
	}

	/**
	 * Remove the specified SisterDownloadApp from storage.
	 * DELETE /sisterDownloadApps/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->sisterDownloadAppRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "SisterDownloadApp deleted successfully");
	}
}
