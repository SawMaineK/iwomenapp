<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePostLikeRequest;
use App\Http\Requests\UpdatePostLikeRequest;
use App\Libraries\Repositories\PostLikeRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class PostLikeController extends AppBaseController
{

	/** @var  PostLikeRepository */
	private $postLikeRepository;

	function __construct(PostLikeRepository $postLikeRepo)
	{
		$this->postLikeRepository = $postLikeRepo;
	}

	/**
	 * Display a listing of the PostLike.
	 *
	 * @return Response
	 */
	public function index()
	{
		$postLikes = $this->postLikeRepository->paginate(10);

		return view('postLikes.index')
			->with('postLikes', $postLikes);
	}

	/**
	 * Show the form for creating a new PostLike.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('postLikes.create');
	}

	/**
	 * Store a newly created PostLike in storage.
	 *
	 * @param CreatePostLikeRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePostLikeRequest $request)
	{
		$input = $request->all();

		$postLike = $this->postLikeRepository->create($input);

		Flash::success('PostLike saved successfully.');

		return redirect(route('postLikes.index'));
	}

	/**
	 * Display the specified PostLike.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$postLike = $this->postLikeRepository->find($id);

		if(empty($postLike))
		{
			Flash::error('PostLike not found');

			return redirect(route('postLikes.index'));
		}

		return view('postLikes.show')->with('postLike', $postLike);
	}

	/**
	 * Show the form for editing the specified PostLike.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$postLike = $this->postLikeRepository->find($id);

		if(empty($postLike))
		{
			Flash::error('PostLike not found');

			return redirect(route('postLikes.index'));
		}

		return view('postLikes.edit')->with('postLike', $postLike);
	}

	/**
	 * Update the specified PostLike in storage.
	 *
	 * @param  int              $id
	 * @param UpdatePostLikeRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatePostLikeRequest $request)
	{
		$postLike = $this->postLikeRepository->find($id);

		if(empty($postLike))
		{
			Flash::error('PostLike not found');

			return redirect(route('postLikes.index'));
		}

		$this->postLikeRepository->updateRich($request->all(), $id);

		Flash::success('PostLike updated successfully.');

		return redirect(route('postLikes.index'));
	}

	/**
	 * Remove the specified PostLike from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$postLike = $this->postLikeRepository->find($id);

		if(empty($postLike))
		{
			Flash::error('PostLike not found');

			return redirect(route('postLikes.index'));
		}

		$this->postLikeRepository->delete($id);

		Flash::success('PostLike deleted successfully.');

		return redirect(route('postLikes.index'));
	}
}
