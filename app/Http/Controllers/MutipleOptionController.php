<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMutipleOptionRequest;
use App\Http\Requests\UpdateMutipleOptionRequest;
use App\Libraries\Repositories\MutipleOptionRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\MutipleQuestion;

class MutipleOptionController extends AppBaseController
{

	/** @var  MutipleOptionRepository */
	private $mutipleOptionRepository;

	function __construct(MutipleOptionRepository $mutipleOptionRepo)
	{
		$this->mutipleOptionRepository = $mutipleOptionRepo;
	}

	/**
	 * Display a listing of the MutipleOption.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mutipleOptions = $this->mutipleOptionRepository->paginate(10);

		return view('mutipleOptions.index')
			->with('mutipleOptions', $mutipleOptions);
	}

	/**
	 * Show the form for creating a new MutipleOption.
	 *
	 * @return Response
	 */
	public function create()
	{
		$mutipleQuestion = MutipleQuestion::orderBy('id','desc')->get();
		$mutipleQuestions = [];
		foreach ($mutipleQuestion as $key => $value) {
			$mutipleQuestions[$value->id] = $value->question;
		}
		return view('mutipleOptions.create')->with(['mutipleQuestions' => $mutipleQuestions]);
	}

	/**
	 * Store a newly created MutipleOption in storage.
	 *
	 * @param CreateMutipleOptionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateMutipleOptionRequest $request)
	{
		$input = $request->all();

		$mutipleOption = $this->mutipleOptionRepository->create($input);

		Flash::success('MutipleOption saved successfully.');

		return redirect(route('mutipleOptions.index'));
	}

	/**
	 * Display the specified MutipleOption.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$mutipleOption = $this->mutipleOptionRepository->find($id);

		if(empty($mutipleOption))
		{
			Flash::error('MutipleOption not found');

			return redirect(route('mutipleOptions.index'));
		}

		return view('mutipleOptions.show')->with('mutipleOption', $mutipleOption);
	}

	/**
	 * Show the form for editing the specified MutipleOption.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$mutipleOption = $this->mutipleOptionRepository->find($id);

		if(empty($mutipleOption))
		{
			Flash::error('MutipleOption not found');

			return redirect(route('mutipleOptions.index'));
		}

		return view('mutipleOptions.edit')->with('mutipleOption', $mutipleOption);
	}

	/**
	 * Update the specified MutipleOption in storage.
	 *
	 * @param  int              $id
	 * @param UpdateMutipleOptionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateMutipleOptionRequest $request)
	{
		$mutipleOption = $this->mutipleOptionRepository->find($id);

		if(empty($mutipleOption))
		{
			Flash::error('MutipleOption not found');

			return redirect(route('mutipleOptions.index'));
		}

		$this->mutipleOptionRepository->updateRich($request->all(), $id);

		Flash::success('MutipleOption updated successfully.');

		return redirect(route('mutipleOptions.index'));
	}

	/**
	 * Remove the specified MutipleOption from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$mutipleOption = $this->mutipleOptionRepository->find($id);

		if(empty($mutipleOption))
		{
			Flash::error('MutipleOption not found');

			return redirect(route('mutipleOptions.index'));
		}

		$this->mutipleOptionRepository->delete($id);

		Flash::success('MutipleOption deleted successfully.');

		return redirect(route('mutipleOptions.index'));
	}
}
