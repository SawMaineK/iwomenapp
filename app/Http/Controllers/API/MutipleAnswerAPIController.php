<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\MutipleAnswerRepository;
use App\Models\MutipleAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class MutipleAnswerAPIController extends AppBaseController
{
	/** @var  MutipleAnswerRepository */
	private $mutipleAnswerRepository;

	function __construct(MutipleAnswerRepository $mutipleAnswerRepo)
	{
		$this->mutipleAnswerRepository = $mutipleAnswerRepo;
	}

	/**
	 * Display a listing of the MutipleAnswer.
	 * GET|HEAD /mutipleAnswers
	 *
	 * @return Response
	 */
	public function index()
	{
		$mutipleAnswers = $this->mutipleAnswerRepository->all();

		return $this->sendResponse($mutipleAnswers->toArray(), "MutipleAnswers retrieved successfully");
	}

	/**
	 * Show the form for creating a new MutipleAnswer.
	 * GET|HEAD /mutipleAnswers/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created MutipleAnswer in storage.
	 * POST /mutipleAnswers
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(MutipleAnswer::$rules) > 0)
			$this->validateRequestOrFail($request, MutipleAnswer::$rules);

		$input = $request->all();

		$answers = json_decode($input['answers']);
		return response()->json($answers);
		DB::beginTransaction();
		foreach ($answers as $key => $value) {
			try {
				$data['mutiple_question_id'] = $value->id;
				$data['answer'] = $value->answer;
				$data['user_id'] = $request->user_id;
				$mutipleAnswers = $this->mutipleAnswerRepository->create($data);
			} catch (Exception $e) {
				DB::rollBack();
                return response()->json('Something went wrong on server.', 500);
			}			
		}
		DB::commit();

		return $this->sendResponse($mutipleAnswers->toArray(), "MutipleAnswer saved successfully");
	}

	/**
	 * Display the specified MutipleAnswer.
	 * GET|HEAD /mutipleAnswers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$mutipleAnswer = $this->mutipleAnswerRepository->apiFindOrFail($id);

		return $this->sendResponse($mutipleAnswer->toArray(), "MutipleAnswer retrieved successfully");
	}

	/**
	 * Show the form for editing the specified MutipleAnswer.
	 * GET|HEAD /mutipleAnswers/{id}/edit
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
	 * Update the specified MutipleAnswer in storage.
	 * PUT/PATCH /mutipleAnswers/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var MutipleAnswer $mutipleAnswer */
		$mutipleAnswer = $this->mutipleAnswerRepository->apiFindOrFail($id);

		$result = $this->mutipleAnswerRepository->updateRich($input, $id);

		$mutipleAnswer = $mutipleAnswer->fresh();

		return $this->sendResponse($mutipleAnswer->toArray(), "MutipleAnswer updated successfully");
	}

	/**
	 * Remove the specified MutipleAnswer from storage.
	 * DELETE /mutipleAnswers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->mutipleAnswerRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "MutipleAnswer deleted successfully");
	}
}
