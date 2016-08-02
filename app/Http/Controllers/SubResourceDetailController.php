<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSubResourceDetailRequest;
use App\Http\Requests\UpdateSubResourceDetailRequest;
use App\Libraries\Repositories\SubResourceDetailRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class SubResourceDetailController extends AppBaseController
{

	/** @var  SubResourceDetailRepository */
	private $subResourceDetailRepository;

	function __construct(SubResourceDetailRepository $subResourceDetailRepo)
	{
		$this->subResourceDetailRepository = $subResourceDetailRepo;
	}

	/**
	 * Display a listing of the SubResourceDetail.
	 *
	 * @return Response
	 */
	public function index()
	{
		$subResourceDetails = $this->subResourceDetailRepository->paginate(10);

		return view('subResourceDetails.index')
			->with('subResourceDetails', $subResourceDetails);
	}

	/**
	 * Show the form for creating a new SubResourceDetail.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('subResourceDetails.create');
	}

	/**
	 * Store a newly created SubResourceDetail in storage.
	 *
	 * @param CreateSubResourceDetailRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateSubResourceDetailRequest $request)
	{
		$input = $request->all();

		$input['objectId'] = 'SubResDetail'.str_random(100);

		$subResourceDetail = $this->subResourceDetailRepository->create($input);

		Flash::success('SubResourceDetail saved successfully.');

		return redirect(route('subResourceDetails.index'));
	}

	/**
	 * Display the specified SubResourceDetail.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$subResourceDetail = $this->subResourceDetailRepository->find($id);

		if(empty($subResourceDetail))
		{
			Flash::error('SubResourceDetail not found');

			return redirect(route('subResourceDetails.index'));
		}

		return view('subResourceDetails.show')->with('subResourceDetail', $subResourceDetail);
	}

	/**
	 * Show the form for editing the specified SubResourceDetail.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$subResourceDetail = $this->subResourceDetailRepository->find($id);

		if(empty($subResourceDetail))
		{
			Flash::error('SubResourceDetail not found');

			return redirect(route('subResourceDetails.index'));
		}

		return view('subResourceDetails.edit')->with('subResourceDetail', $subResourceDetail);
	}

	/**
	 * Update the specified SubResourceDetail in storage.
	 *
	 * @param  int              $id
	 * @param UpdateSubResourceDetailRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateSubResourceDetailRequest $request)
	{
		$subResourceDetail = $this->subResourceDetailRepository->find($id);

		if(empty($subResourceDetail))
		{
			Flash::error('SubResourceDetail not found');

			return redirect(route('subResourceDetails.index'));
		}

		$this->subResourceDetailRepository->updateRich($request->all(), $id);

		Flash::success('SubResourceDetail updated successfully.');

		return redirect(route('subResourceDetails.index'));
	}

	/**
	 * Remove the specified SubResourceDetail from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$subResourceDetail = $this->subResourceDetailRepository->find($id);

		if(empty($subResourceDetail))
		{
			Flash::error('SubResourceDetail not found');

			return redirect(route('subResourceDetails.index'));
		}

		$this->subResourceDetailRepository->delete($id);

		Flash::success('SubResourceDetail deleted successfully.');

		return redirect(route('subResourceDetails.index'));
	}
}
