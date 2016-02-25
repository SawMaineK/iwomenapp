<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Libraries\Repositories\PostRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PostController extends AppBaseController
{

	/** @var  PostRepository */
	private $postRepository;

	function __construct(PostRepository $postRepo)
	{
		$this->postRepository = $postRepo;
	}

	/**
	 * Display a listing of the Post.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = $this->postRepository->paginate(10);

		return view('posts.index')
			->with('posts', $posts);
	}

	/**
	 * Show the form for creating a new Post.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('posts.create');
	}

	/**
	 * Store a newly created Post in storage.
	 *
	 * @param CreatePostRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePostRequest $request)
	{
		$input = $request->all();

		if($request->file('image')){
			$image = $this->uploadImage($request->file('image'),'/posts_photo/');
			$input['image'] = $image['resize_url'][0];
		}

		$post = $this->postRepository->create($input);

		Flash::success('Post saved successfully.');

		return redirect(route('posts.index'));
	}

	/**
	 * Display the specified Post.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$post = $this->postRepository->find($id);

		if(empty($post))
		{
			Flash::error('Post not found');

			return redirect(route('posts.index'));
		}

		return view('posts.show')->with('post', $post);
	}

	/**
	 * Show the form for editing the specified Post.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$post = $this->postRepository->find($id);

		if(empty($post))
		{
			Flash::error('Post not found');

			return redirect(route('posts.index'));
		}

		return view('posts.edit')->with('post', $post);
	}

	/**
	 * Update the specified Post in storage.
	 *
	 * @param  int              $id
	 * @param UpdatePostRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatePostRequest $request)
	{
		$post = $this->postRepository->find($id);

		if(empty($post))
		{
			Flash::error('Post not found');

			return redirect(route('posts.index'));
		}

		$input = $request->all();

		if($request->file('image')){
			$image = $this->uploadImage($request->file('image'),'/posts_photo/');
			$input['image'] = $image['resize_url'][0];
		}

		$this->postRepository->updateRich($input, $id);

		Flash::success('Post updated successfully.');

		return redirect(route('posts.index'));
	}

	/**
	 * Remove the specified Post from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = $this->postRepository->find($id);

		if(empty($post))
		{
			Flash::error('Post not found');

			return redirect(route('posts.index'));
		}

		$this->postRepository->delete($id);

		Flash::success('Post deleted successfully.');

		return redirect(route('posts.index'));
	}
}
