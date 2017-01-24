<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatereportPostRequest;
use App\Http\Requests\UpdatereportPostRequest;
use App\Libraries\Repositories\reportPostRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class reportPostController extends AppBaseController
{

	/** @var  reportPostRepository */
	private $reportPostRepository;

	function __construct(reportPostRepository $reportPostRepo)
	{
		$this->reportPostRepository = $reportPostRepo;
	}

	/**
	 * Display a listing of the reportPost.
	 *
	 * @return Response
	 */
	public function index()
	{
		$reportPosts = $this->reportPostRepository->paginate(10);

		return view('reportPosts.index')
			->with('reportPosts', $reportPosts);
	}

	/**
	 * Show the form for creating a new reportPost.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('reportPosts.create');
	}

	/**
	 * Store a newly created reportPost in storage.
	 *
	 * @param CreatereportPostRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatereportPostRequest $request)
	{
		$input = $request->all();

		$reportPost = $this->reportPostRepository->create($input);

		Flash::success('reportPost saved successfully.');

		return redirect(route('reportPosts.index'));
	}

	/**
	 * Display the specified reportPost.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$reportPost = $this->reportPostRepository->find($id);

		if(empty($reportPost))
		{
			Flash::error('reportPost not found');

			return redirect(route('reportPosts.index'));
		}

		return view('reportPosts.show')->with('reportPost', $reportPost);
	}

	/**
	 * Show the form for editing the specified reportPost.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$reportPost = $this->reportPostRepository->find($id);

		if(empty($reportPost))
		{
			Flash::error('reportPost not found');

			return redirect(route('reportPosts.index'));
		}

		return view('reportPosts.edit')->with('reportPost', $reportPost);
	}

	/**
	 * Update the specified reportPost in storage.
	 *
	 * @param  int              $id
	 * @param UpdatereportPostRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatereportPostRequest $request)
	{
		$reportPost = $this->reportPostRepository->find($id);

		if(empty($reportPost))
		{
			Flash::error('reportPost not found');

			return redirect(route('reportPosts.index'));
		}

		$this->reportPostRepository->updateRich($request->all(), $id);

		Flash::success('reportPost updated successfully.');

		return redirect(route('reportPosts.index'));
	}

	/**
	 * Remove the specified reportPost from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$reportPost = $this->reportPostRepository->find($id);

		if(empty($reportPost))
		{
			Flash::error('reportPost not found');

			return redirect(route('reportPosts.index'));
		}

		$this->reportPostRepository->delete($id);

		Flash::success('reportPost deleted successfully.');

		return redirect(route('reportPosts.index'));
	}
}
