<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ResourcesRepository;
use App\Models\Resources;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class ResourcesAPIController extends AppBaseController
{
	/** @var  ResourcesRepository */
	private $resourcesRepository;

	function __construct(ResourcesRepository $resourcesRepo)
	{
		$this->resourcesRepository = $resourcesRepo;
	}

	/**
	 * Display a listing of the Resources.
	 * GET|HEAD /resources
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$offset  = $request->page ? $request->page : 1;
		$limit   = $request->limit ? $request->limit : 12;
		$isAllow = $request->isAllow ? $request->isAllow : '';

		$offset  = ($offset - 1) * $limit;
		
		if($isAllow && $isAllow != '')
			$resources = Resources::where('isAllow',$isAllow)->orderBy('id','desc')->offset($offset)->limit($limit)->get();
		else
			$resources = Resources::orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($resources);
	}

	public function thisWeekContent()
	{
		$resources = Resources::where('week_content',1)->first();
		return response()->json($resources);
	}

	/**
	 * Show the form for creating a new Resources.
	 * GET|HEAD /resources/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Resources in storage.
	 * POST /resources
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Resources::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, Resources::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$input['objectId'] = 'Reses'.str_random(10);

		$resources = $this->resourcesRepository->create($input);

		return $this->sendResponse($resources->toArray(), "Resources saved successfully");
	}

	/**
	 * Display the specified Resources.
	 * GET|HEAD /resources/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$resources = $this->resourcesRepository->apiFindOrFail($id);

		return $this->sendResponse($resources->toArray(), "Resources retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Resources.
	 * GET|HEAD /resources/{id}/edit
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
	 * Update the specified Resources in storage.
	 * PUT/PATCH /resources/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Resources $resources */
		$resources = $this->resourcesRepository->apiFindOrFail($id);

		$result = $this->resourcesRepository->updateRich($input, $id);

		$resources = $resources->fresh();

		return $this->sendResponse($resources->toArray(), "Resources updated successfully");
	}

	/**
	 * Remove the specified Resources from storage.
	 * DELETE /resources/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->resourcesRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Resources deleted successfully");
	}
}
