<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateIwomenPostLikeRequest;
use App\Http\Requests\UpdateIwomenPostLikeRequest;
use App\Libraries\Repositories\IwomenPostLikeRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class IwomenPostLikeController extends AppBaseController
{

	/** @var  IwomenPostLikeRepository */
	private $iwomenPostLikeRepository;

	function __construct(IwomenPostLikeRepository $iwomenPostLikeRepo)
	{
		$this->iwomenPostLikeRepository = $iwomenPostLikeRepo;
	}

	/**
	 * Display a listing of the IwomenPostLike.
	 *
	 * @return Response
	 */
	public function index()
	{
		$iwomenPostLikes = $this->iwomenPostLikeRepository->paginate(10);

		return view('iwomenPostLikes.index')
			->with('iwomenPostLikes', $iwomenPostLikes);
	}

	/**
	 * Show the form for creating a new IwomenPostLike.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('iwomenPostLikes.create');
	}

	/**
	 * Store a newly created IwomenPostLike in storage.
	 *
	 * @param CreateIwomenPostLikeRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateIwomenPostLikeRequest $request)
	{
		$input = $request->all();

		$iwomenPostLike = $this->iwomenPostLikeRepository->create($input);

		Flash::success('IwomenPostLike saved successfully.');

		return redirect(route('iwomenPostLikes.index'));
	}

	/**
	 * Display the specified IwomenPostLike.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$iwomenPostLike = $this->iwomenPostLikeRepository->find($id);

		if(empty($iwomenPostLike))
		{
			Flash::error('IwomenPostLike not found');

			return redirect(route('iwomenPostLikes.index'));
		}

		return view('iwomenPostLikes.show')->with('iwomenPostLike', $iwomenPostLike);
	}

	/**
	 * Show the form for editing the specified IwomenPostLike.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$iwomenPostLike = $this->iwomenPostLikeRepository->find($id);

		if(empty($iwomenPostLike))
		{
			Flash::error('IwomenPostLike not found');

			return redirect(route('iwomenPostLikes.index'));
		}

		return view('iwomenPostLikes.edit')->with('iwomenPostLike', $iwomenPostLike);
	}

	/**
	 * Update the specified IwomenPostLike in storage.
	 *
	 * @param  int              $id
	 * @param UpdateIwomenPostLikeRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateIwomenPostLikeRequest $request)
	{
		$iwomenPostLike = $this->iwomenPostLikeRepository->find($id);

		if(empty($iwomenPostLike))
		{
			Flash::error('IwomenPostLike not found');

			return redirect(route('iwomenPostLikes.index'));
		}

		$this->iwomenPostLikeRepository->updateRich($request->all(), $id);

		Flash::success('IwomenPostLike updated successfully.');

		return redirect(route('iwomenPostLikes.index'));
	}

	/**
	 * Remove the specified IwomenPostLike from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$iwomenPostLike = $this->iwomenPostLikeRepository->find($id);

		if(empty($iwomenPostLike))
		{
			Flash::error('IwomenPostLike not found');

			return redirect(route('iwomenPostLikes.index'));
		}

		$this->iwomenPostLikeRepository->delete($id);

		Flash::success('IwomenPostLike deleted successfully.');

		return redirect(route('iwomenPostLikes.index'));
	}
}
