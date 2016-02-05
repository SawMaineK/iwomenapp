<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateIwomenPostRequest;
use App\Http\Requests\UpdateIwomenPostRequest;
use App\Libraries\Repositories\IwomenPostRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class IwomenPostController extends AppBaseController
{

	/** @var  IwomenPostRepository */
	private $iwomenPostRepository;

	function __construct(IwomenPostRepository $iwomenPostRepo)
	{
		$this->iwomenPostRepository = $iwomenPostRepo;
	}

	/**
	 * Display a listing of the IwomenPost.
	 *
	 * @return Response
	 */
	public function index()
	{
		$iwomenPosts = $this->iwomenPostRepository->paginate(10);

		return view('iwomenPosts.index')
			->with('iwomenPosts', $iwomenPosts);
	}

	/**
	 * Show the form for creating a new IwomenPost.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('iwomenPosts.create');
	}

	/**
	 * Store a newly created IwomenPost in storage.
	 *
	 * @param CreateIwomenPostRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateIwomenPostRequest $request)
	{
		$input = $request->all();

		$iwomenPost = $this->iwomenPostRepository->create($input);

		Flash::success('IwomenPost saved successfully.');

		return redirect(route('iwomenPosts.index'));
	}

	/**
	 * Display the specified IwomenPost.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$iwomenPost = $this->iwomenPostRepository->find($id);

		if(empty($iwomenPost))
		{
			Flash::error('IwomenPost not found');

			return redirect(route('iwomenPosts.index'));
		}

		return view('iwomenPosts.show')->with('iwomenPost', $iwomenPost);
	}

	/**
	 * Show the form for editing the specified IwomenPost.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$iwomenPost = $this->iwomenPostRepository->find($id);

		if(empty($iwomenPost))
		{
			Flash::error('IwomenPost not found');

			return redirect(route('iwomenPosts.index'));
		}

		return view('iwomenPosts.edit')->with('iwomenPost', $iwomenPost);
	}

	/**
	 * Update the specified IwomenPost in storage.
	 *
	 * @param  int              $id
	 * @param UpdateIwomenPostRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateIwomenPostRequest $request)
	{
		$iwomenPost = $this->iwomenPostRepository->find($id);

		if(empty($iwomenPost))
		{
			Flash::error('IwomenPost not found');

			return redirect(route('iwomenPosts.index'));
		}

		$this->iwomenPostRepository->updateRich($request->all(), $id);

		Flash::success('IwomenPost updated successfully.');

		return redirect(route('iwomenPosts.index'));
	}

	/**
	 * Remove the specified IwomenPost from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$iwomenPost = $this->iwomenPostRepository->find($id);

		if(empty($iwomenPost))
		{
			Flash::error('IwomenPost not found');

			return redirect(route('iwomenPosts.index'));
		}

		$this->iwomenPostRepository->delete($id);

		Flash::success('IwomenPost deleted successfully.');

		return redirect(route('iwomenPosts.index'));
	}
}
