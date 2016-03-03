<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMutipleAnswerRequest;
use App\Http\Requests\UpdateMutipleAnswerRequest;
use App\Libraries\Repositories\MutipleAnswerRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class MutipleAnswerController extends AppBaseController
{

	/** @var  MutipleAnswerRepository */
	private $mutipleAnswerRepository;

	function __construct(MutipleAnswerRepository $mutipleAnswerRepo)
	{
		$this->mutipleAnswerRepository = $mutipleAnswerRepo;
	}

	/**
	 * Display a listing of the MutipleAnswer.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mutipleAnswers = $this->mutipleAnswerRepository->paginate(10);

		return view('mutipleAnswers.index')
			->with('mutipleAnswers', $mutipleAnswers);
	}

	/**
	 * Show the form for creating a new MutipleAnswer.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('mutipleAnswers.create');
	}

	/**
	 * Store a newly created MutipleAnswer in storage.
	 *
	 * @param CreateMutipleAnswerRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateMutipleAnswerRequest $request)
	{
		$input = $request->all();

		$mutipleAnswer = $this->mutipleAnswerRepository->create($input);

		Flash::success('MutipleAnswer saved successfully.');

		return redirect(route('mutipleAnswers.index'));
	}

	/**
	 * Display the specified MutipleAnswer.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$mutipleAnswer = $this->mutipleAnswerRepository->find($id);

		if(empty($mutipleAnswer))
		{
			Flash::error('MutipleAnswer not found');

			return redirect(route('mutipleAnswers.index'));
		}

		return view('mutipleAnswers.show')->with('mutipleAnswer', $mutipleAnswer);
	}

	/**
	 * Show the form for editing the specified MutipleAnswer.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$mutipleAnswer = $this->mutipleAnswerRepository->find($id);

		if(empty($mutipleAnswer))
		{
			Flash::error('MutipleAnswer not found');

			return redirect(route('mutipleAnswers.index'));
		}

		return view('mutipleAnswers.edit')->with('mutipleAnswer', $mutipleAnswer);
	}

	/**
	 * Update the specified MutipleAnswer in storage.
	 *
	 * @param  int              $id
	 * @param UpdateMutipleAnswerRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateMutipleAnswerRequest $request)
	{
		$mutipleAnswer = $this->mutipleAnswerRepository->find($id);

		if(empty($mutipleAnswer))
		{
			Flash::error('MutipleAnswer not found');

			return redirect(route('mutipleAnswers.index'));
		}

		$this->mutipleAnswerRepository->updateRich($request->all(), $id);

		Flash::success('MutipleAnswer updated successfully.');

		return redirect(route('mutipleAnswers.index'));
	}

	/**
	 * Remove the specified MutipleAnswer from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$mutipleAnswer = $this->mutipleAnswerRepository->find($id);

		if(empty($mutipleAnswer))
		{
			Flash::error('MutipleAnswer not found');

			return redirect(route('mutipleAnswers.index'));
		}

		$this->mutipleAnswerRepository->delete($id);

		Flash::success('MutipleAnswer deleted successfully.');

		return redirect(route('mutipleAnswers.index'));
	}
}
