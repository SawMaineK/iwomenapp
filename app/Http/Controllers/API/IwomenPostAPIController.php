<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\IwomenPostRepository;
use App\Models\IwomenPost;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class IwomenPostAPIController extends AppBaseController
{
	/** @var  IwomenPostRepository */
	private $iwomenPostRepository;

	function __construct(IwomenPostRepository $iwomenPostRepo)
	{
		$this->iwomenPostRepository = $iwomenPostRepo;
	}

	/**
	 * Display a listing of the IwomenPost.
	 * GET|HEAD /iwomenPosts
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$offset  = $request->page ? $request->page : 1;
		$limit   = $request->limit ? $request->limit : 12;
		$sorting = $request->sorting;
		$isAllow = $request->isAllow ? $request->isAllow : '';
		$search  = $request->keywords ? $request->keywords : '';
		
		$offset  = ($offset - 1) * $limit;
		if($sorting == 'Most Like'){
			if($isAllow && $isAllow != '')
				$posts = IwomenPost::where('isAllow',$isAllow)->orderBy('likes','desc')->offset($offset)->limit($limit)->get();
			else
				$posts = IwomenPost::orderBy('likes','desc')->offset($offset)->limit($limit)->get();

		}else{
			if($isAllow && $isAllow != '')
				$posts = IwomenPost::where('isAllow',$isAllow)->orderBy('postUploadedDate','desc')->offset($offset)->limit($limit)->get();
			else
				$posts = IwomenPost::orderBy('postUploadedDate','desc')->offset($offset)->limit($limit)->get();
		}
		
		return response()->json($posts);
	}

	public function search(Request $request){
		$search  = $request->keywords ? $request->keywords : '';
		$offset  = $request->page ? $request->page : 1;
		$limit   = $request->limit ? $request->limit : 12;
		$isAllow = $request->isAllow ? $request->isAllow : 0;

		$offset  = ($offset - 1) * $limit;

		$posts = IwomenPost::where('title','like', '%'.$search.'%')
								->orwhere('titleMm','like', '%'.$search.'%')
								->orwhere('content','like', '%'.$search.'%')
								->orwhere('content_mm','like', '%'.$search.'%')
								->orwhere('postUploadName','like', '%'.$search.'%')
								->where('isAllow',$isAllow)
								->orderBy('postUploadedDate','desc')
								->offset($offset)->limit($limit)->get();
		$results = [];
		if(count($posts) > 0){
			foreach ($posts as $post) {
				if($post->isAllow == 1){
					$results[] = $post;
				}
			}
		}
		return response()->json($results);
	}

	public function thisContent()
	{
		$post = IwomenPost::where('week_content',1)->first();
		return response()->json($post);
	}

	/**
	 * Show the form for creating a new IwomenPost.
	 * GET|HEAD /iwomenPosts/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created IwomenPost in storage.
	 * POST /iwomenPosts
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(IwomenPost::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, IwomenPost::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$input['objectId'] = 'iPost'.str_random(10);

		$iwomenPosts = $this->iwomenPostRepository->create($input);

		return $this->sendResponse($iwomenPosts->toArray(), "IwomenPost saved successfully");
	}

	/**
	 * Display the specified IwomenPost.
	 * GET|HEAD /iwomenPosts/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id, Request $request)
	{
		if($request->isAllow != null)
			$post = IwomenPost::where('id', $id)->where('isAllow', $request->isAllow)->first();
		else
			$post = IwomenPost::where('id', $id)->first();
		return response()->json($post);
	}

	/**
	 * Show the form for editing the specified IwomenPost.
	 * GET|HEAD /iwomenPosts/{id}/edit
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
	 * Update the specified IwomenPost in storage.
	 * PUT/PATCH /iwomenPosts/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var IwomenPost $iwomenPost */
		$iwomenPost = $this->iwomenPostRepository->apiFindOrFail($id);

		$result = $this->iwomenPostRepository->updateRich($input, $id);

		$iwomenPost = $iwomenPost->fresh();

		return $this->sendResponse($iwomenPost->toArray(), "IwomenPost updated successfully");
	}

	/**
	 * Remove the specified IwomenPost from storage.
	 * DELETE /iwomenPosts/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->iwomenPostRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "IwomenPost deleted successfully");
	}
}
