<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMutipleQuestionRequest;
use App\Http\Requests\UpdateMutipleQuestionRequest;
use App\Libraries\Repositories\MutipleQuestionRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\CompetitionQuestion;

class MutipleQuestionController extends AppBaseController
{

	/** @var  MutipleQuestionRepository */
	private $mutipleQuestionRepository;

	function __construct(MutipleQuestionRepository $mutipleQuestionRepo)
	{
		$this->mutipleQuestionRepository = $mutipleQuestionRepo;
	}

	/**
	 * Display a listing of the MutipleQuestion.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mutipleQuestions = $this->mutipleQuestionRepository->paginate(10);

		return view('mutipleQuestions.index')
			->with('mutipleQuestions', $mutipleQuestions);
	}

	/**
	 * Show the form for creating a new MutipleQuestion.
	 *
	 * @return Response
	 */
	public function create()
	{
		$question = CompetitionQuestion::orderBy('id','desc')->get();
		$questions = [];
		foreach ($question as $key => $value) {
			$questions[$value->id] = $value->question;
		}
		return view('mutipleQuestions.create')->with(['questions' => $questions]);
	}

	/**
	 * Store a newly created MutipleQuestion in storage.
	 *
	 * @param CreateMutipleQuestionRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateMutipleQuestionRequest $request)
	{
		$input = $request->all();

		$mutipleQuestion = $this->mutipleQuestionRepository->create($input);

		Flash::success('MutipleQuestion saved successfully.');

		return redirect(route('mutipleQuestions.index'));
	}

	/**
	 * Display the specified MutipleQuestion.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$mutipleQuestion = $this->mutipleQuestionRepository->find($id);

		if(empty($mutipleQuestion))
		{
			Flash::error('MutipleQuestion not found');

			return redirect(route('mutipleQuestions.index'));
		}

		return view('mutipleQuestions.show')->with('mutipleQuestion', $mutipleQuestion);
	}

	/**
	 * Show the form for editing the specified MutipleQuestion.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$mutipleQuestion = $this->mutipleQuestionRepository->find($id);

		if(empty($mutipleQuestion))
		{
			Flash::error('MutipleQuestion not found');

			return redirect(route('mutipleQuestions.index'));
		}

		$question = CompetitionQuestion::orderBy('id','desc')->get();
		$questions = [];
		foreach ($question as $key => $value) {
			$questions[$value->id] = $value->question;
		}

		return view('mutipleQuestions.edit')->with(['mutipleQuestion' => $mutipleQuestion, 'questions' => $questions]);
	}

	/**
	 * Update the specified MutipleQuestion in storage.
	 *
	 * @param  int              $id
	 * @param UpdateMutipleQuestionRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateMutipleQuestionRequest $request)
	{
		$mutipleQuestion = $this->mutipleQuestionRepository->find($id);

		if(empty($mutipleQuestion))
		{
			Flash::error('MutipleQuestion not found');

			return redirect(route('mutipleQuestions.index'));
		}

		$this->mutipleQuestionRepository->updateRich($request->all(), $id);

		Flash::success('MutipleQuestion updated successfully.');

		return redirect(route('mutipleQuestions.index'));
	}

	/**
	 * Remove the specified MutipleQuestion from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$mutipleQuestion = $this->mutipleQuestionRepository->find($id);

		if(empty($mutipleQuestion))
		{
			Flash::error('MutipleQuestion not found');

			return redirect(route('mutipleQuestions.index'));
		}

		$this->mutipleQuestionRepository->delete($id);

		Flash::success('MutipleQuestion deleted successfully.');

		return redirect(route('mutipleQuestions.index'));
	}
}
