<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\StickerStoreRepository;
use App\Models\StickerStore;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class StickerStoreAPIController extends AppBaseController
{
	/** @var  StickerStoreRepository */
	private $stickerStoreRepository;

	function __construct(StickerStoreRepository $stickerStoreRepo)
	{
		$this->stickerStoreRepository = $stickerStoreRepo;
	}

	/**
	 * Display a listing of the StickerStore.
	 * GET|HEAD /stickerStores
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$offset  = $request->page ? $request->page : 1;
		$limit   = $request->limit ? $request->limit : 12;

		$offset  = ($offset - 1) * $limit;
		
		$posts = StickerStore::orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($posts);
	}

	/**
	 * Show the form for creating a new StickerStore.
	 * GET|HEAD /stickerStores/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created StickerStore in storage.
	 * POST /stickerStores
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(StickerStore::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, StickerStore::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$input['objectId'] = str_random(10);

		$stickerStores = $this->stickerStoreRepository->create($input);

		return $this->sendResponse($stickerStores->toArray(), "StickerStore saved successfully");
	}

	/**
	 * Display the specified StickerStore.
	 * GET|HEAD /stickerStores/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$stickerStore = $this->stickerStoreRepository->apiFindOrFail($id);

		return $this->sendResponse($stickerStore->toArray(), "StickerStore retrieved successfully");
	}

	/**
	 * Show the form for editing the specified StickerStore.
	 * GET|HEAD /stickerStores/{id}/edit
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
	 * Update the specified StickerStore in storage.
	 * PUT/PATCH /stickerStores/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var StickerStore $stickerStore */
		$stickerStore = $this->stickerStoreRepository->apiFindOrFail($id);

		$result = $this->stickerStoreRepository->updateRich($input, $id);

		$stickerStore = $stickerStore->fresh();

		return $this->sendResponse($stickerStore->toArray(), "StickerStore updated successfully");
	}

	/**
	 * Remove the specified StickerStore from storage.
	 * DELETE /stickerStores/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->stickerStoreRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "StickerStore deleted successfully");
	}
}
