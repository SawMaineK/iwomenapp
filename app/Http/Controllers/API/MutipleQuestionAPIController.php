<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\MutipleQuestionRepository;
use App\Models\MutipleQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class MutipleQuestionAPIController extends AppBaseController
{
	/** @var  MutipleQuestionRepository */
	private $mutipleQuestionRepository;

	function __construct(MutipleQuestionRepository $mutipleQuestionRepo)
	{
		$this->mutipleQuestionRepository = $mutipleQuestionRepo;
	}

	/**
	 * Display a listing of the MutipleQuestion.
	 * GET|HEAD /mutipleQuestions
	 *
	 * @return Response
	 */
	public function index()
	{
		$mutipleQuestions = $this->mutipleQuestionRepository->all();

		return $this->sendResponse($mutipleQuestions->toArray(), "MutipleQuestions retrieved successfully");
	}

	/**
	 * Show the form for creating a new MutipleQuestion.
	 * GET|HEAD /mutipleQuestions/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created MutipleQuestion in storage.
	 * POST /mutipleQuestions
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(MutipleQuestion::$rules) > 0)
			$this->validateRequestOrFail($request, MutipleQuestion::$rules);

		$input = $request->all();

		$mutipleQuestions = $this->mutipleQuestionRepository->create($input);

		return $this->sendResponse($mutipleQuestions->toArray(), "MutipleQuestion saved successfully");
	}

	/**
	 * Display the specified MutipleQuestion.
	 * GET|HEAD /mutipleQuestions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$mutipleQuestion = $this->mutipleQuestionRepository->apiFindOrFail($id);

		return $this->sendResponse($mutipleQuestion->toArray(), "MutipleQuestion retrieved successfully");
	}

	/**
	 * Show the form for editing the specified MutipleQuestion.
	 * GET|HEAD /mutipleQuestions/{id}/edit
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		// maybe, you can return a template for JS
//		Errors::throwHttpExceptionWithCode(Errors::EDITION_FORM_NOT_EXISTS, ['id' => $id], static::getHATEOAS(['%id' => $id]));
	}

	/**
	 * Update the specified MutipleQuestion in storage.
	 * PUT/PATCH /mutipleQuestions/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var MutipleQuestion $mutipleQuestion */
		$mutipleQuestion = $this->mutipleQuestionRepository->apiFindOrFail($id);

		$result = $this->mutipleQuestionRepository->updateRich($input, $id);

		$mutipleQuestion = $mutipleQuestion->fresh();

		return $this->sendResponse($mutipleQuestion->toArray(), "MutipleQuestion updated successfully");
	}

	/**
	 * Remove the specified MutipleQuestion from storage.
	 * DELETE /mutipleQuestions/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->mutipleQuestionRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "MutipleQuestion deleted successfully");
	}
}
