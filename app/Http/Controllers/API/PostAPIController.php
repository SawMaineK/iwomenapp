<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\PostRepository;
use App\Models\Post;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PostAPIController extends AppBaseController
{
	/** @var  PostRepository */
	private $postRepository;

	function __construct(PostRepository $postRepo)
	{
		$this->postRepository = $postRepo;
	}

	/**
	 * Display a listing of the Post.
	 * GET|HEAD /posts
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$offset  = $request->page ? $request->page : 1;
		$limit   = $request->limit ? $request->limit : 12;
		$category = $request->category;
		
		$offset  = ($offset - 1) * $limit;
		if($category){
			$posts = Post::where('category_id', $category)->orderBy('id','desc')->offset($offset)->limit($limit)->get();
		}else{
			$posts = Post::orderBy('id','desc')->offset($offset)->limit($limit)->get();
		}
		
		return response()->json($posts);
	}

	/**
	 * Show the form for creating a new Post.
	 * GET|HEAD /posts/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Post in storage.
	 * POST /posts
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Post::$rules) > 0)
			$this->validateRequestOrFail($request, Post::$rules);

		$input = $request->all();

		$input['objectId'] = str_random(10);

		$posts = $this->postRepository->create($input);

		return $this->sendResponse($posts->toArray(), "Post saved successfully");
	}

	/**
	 * Display the specified Post.
	 * GET|HEAD /posts/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$post = $this->postRepository->apiFindOrFail($id);

		return $this->sendResponse($post->toArray(), "Post retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Post.
	 * GET|HEAD /posts/{id}/edit
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
	 * Update the specified Post in storage.
	 * PUT/PATCH /posts/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Post $post */
		$post = $this->postRepository->apiFindOrFail($id);

		$result = $this->postRepository->updateRich($input, $id);

		$post = $post->fresh();

		return $this->sendResponse($post->toArray(), "Post updated successfully");
	}

	/**
	 * Remove the specified Post from storage.
	 * DELETE /posts/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->postRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Post deleted successfully");
	}
}
