<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateResourceLikeRequest;
use App\Http\Requests\UpdateResourceLikeRequest;
use App\Libraries\Repositories\ResourceLikeRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ResourceLikeController extends AppBaseController
{

	/** @var  ResourceLikeRepository */
	private $resourceLikeRepository;

	function __construct(ResourceLikeRepository $resourceLikeRepo)
	{
		$this->resourceLikeRepository = $resourceLikeRepo;
	}

	/**
	 * Display a listing of the ResourceLike.
	 *
	 * @return Response
	 */
	public function index()
	{
		$resourceLikes = $this->resourceLikeRepository->paginate(10);

		return view('resourceLikes.index')
			->with('resourceLikes', $resourceLikes);
	}

	/**
	 * Show the form for creating a new ResourceLike.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('resourceLikes.create');
	}

	/**
	 * Store a newly created ResourceLike in storage.
	 *
	 * @param CreateResourceLikeRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateResourceLikeRequest $request)
	{
		$input = $request->all();

		$resourceLike = $this->resourceLikeRepository->create($input);

		Flash::success('ResourceLike saved successfully.');

		return redirect(route('resourceLikes.index'));
	}

	/**
	 * Display the specified ResourceLike.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$resourceLike = $this->resourceLikeRepository->find($id);

		if(empty($resourceLike))
		{
			Flash::error('ResourceLike not found');

			return redirect(route('resourceLikes.index'));
		}

		return view('resourceLikes.show')->with('resourceLike', $resourceLike);
	}

	/**
	 * Show the form for editing the specified ResourceLike.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$resourceLike = $this->resourceLikeRepository->find($id);

		if(empty($resourceLike))
		{
			Flash::error('ResourceLike not found');

			return redirect(route('resourceLikes.index'));
		}

		return view('resourceLikes.edit')->with('resourceLike', $resourceLike);
	}

	/**
	 * Update the specified ResourceLike in storage.
	 *
	 * @param  int              $id
	 * @param UpdateResourceLikeRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateResourceLikeRequest $request)
	{
		$resourceLike = $this->resourceLikeRepository->find($id);

		if(empty($resourceLike))
		{
			Flash::error('ResourceLike not found');

			return redirect(route('resourceLikes.index'));
		}

		$this->resourceLikeRepository->updateRich($request->all(), $id);

		Flash::success('ResourceLike updated successfully.');

		return redirect(route('resourceLikes.index'));
	}

	/**
	 * Remove the specified ResourceLike from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$resourceLike = $this->resourceLikeRepository->find($id);

		if(empty($resourceLike))
		{
			Flash::error('ResourceLike not found');

			return redirect(route('resourceLikes.index'));
		}

		$this->resourceLikeRepository->delete($id);

		Flash::success('ResourceLike deleted successfully.');

		return redirect(route('resourceLikes.index'));
	}
}
