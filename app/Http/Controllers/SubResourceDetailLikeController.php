<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSubResourceDetailLikeRequest;
use App\Http\Requests\UpdateSubResourceDetailLikeRequest;
use App\Libraries\Repositories\SubResourceDetailLikeRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class SubResourceDetailLikeController extends AppBaseController
{

	/** @var  SubResourceDetailLikeRepository */
	private $subResourceDetailLikeRepository;

	function __construct(SubResourceDetailLikeRepository $subResourceDetailLikeRepo)
	{
		$this->subResourceDetailLikeRepository = $subResourceDetailLikeRepo;
	}

	/**
	 * Display a listing of the SubResourceDetailLike.
	 *
	 * @return Response
	 */
	public function index()
	{
		$subResourceDetailLikes = $this->subResourceDetailLikeRepository->paginate(10);

		return view('subResourceDetailLikes.index')
			->with('subResourceDetailLikes', $subResourceDetailLikes);
	}

	/**
	 * Show the form for creating a new SubResourceDetailLike.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('subResourceDetailLikes.create');
	}

	/**
	 * Store a newly created SubResourceDetailLike in storage.
	 *
	 * @param CreateSubResourceDetailLikeRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSubResourceDetailLikeRequest $request)
	{
		$input = $request->all();

		$subResourceDetailLike = $this->subResourceDetailLikeRepository->create($input);

		Flash::success('SubResourceDetailLike saved successfully.');

		return redirect(route('subResourceDetailLikes.index'));
	}

	/**
	 * Display the specified SubResourceDetailLike.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$subResourceDetailLike = $this->subResourceDetailLikeRepository->find($id);

		if(empty($subResourceDetailLike))
		{
			Flash::error('SubResourceDetailLike not found');

			return redirect(route('subResourceDetailLikes.index'));
		}

		return view('subResourceDetailLikes.show')->with('subResourceDetailLike', $subResourceDetailLike);
	}

	/**
	 * Show the form for editing the specified SubResourceDetailLike.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$subResourceDetailLike = $this->subResourceDetailLikeRepository->find($id);

		if(empty($subResourceDetailLike))
		{
			Flash::error('SubResourceDetailLike not found');

			return redirect(route('subResourceDetailLikes.index'));
		}

		return view('subResourceDetailLikes.edit')->with('subResourceDetailLike', $subResourceDetailLike);
	}

	/**
	 * Update the specified SubResourceDetailLike in storage.
	 *
	 * @param  int              $id
	 * @param UpdateSubResourceDetailLikeRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateSubResourceDetailLikeRequest $request)
	{
		$subResourceDetailLike = $this->subResourceDetailLikeRepository->find($id);

		if(empty($subResourceDetailLike))
		{
			Flash::error('SubResourceDetailLike not found');

			return redirect(route('subResourceDetailLikes.index'));
		}

		$this->subResourceDetailLikeRepository->updateRich($request->all(), $id);

		Flash::success('SubResourceDetailLike updated successfully.');

		return redirect(route('subResourceDetailLikes.index'));
	}

	/**
	 * Remove the specified SubResourceDetailLike from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$subResourceDetailLike = $this->subResourceDetailLikeRepository->find($id);

		if(empty($subResourceDetailLike))
		{
			Flash::error('SubResourceDetailLike not found');

			return redirect(route('subResourceDetailLikes.index'));
		}

		$this->subResourceDetailLikeRepository->delete($id);

		Flash::success('SubResourceDetailLike deleted successfully.');

		return redirect(route('subResourceDetailLikes.index'));
	}
}
