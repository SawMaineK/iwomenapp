<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\CalendarRepository;
use App\Models\Calendar;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;

class CalendarAPIController extends AppBaseController
{
	/** @var  CalendarRepository */
	private $calendarRepository;

	function __construct(CalendarRepository $calendarRepo)
	{
		$this->calendarRepository = $calendarRepo;
	}

	/**
	 * Display a listing of the Calendar.
	 * GET|HEAD /calendars
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$offset  = $request->page ? $request->page : 1;
		$limit   = $request->limit ? $request->limit : 12;

		$offset  = ($offset - 1) * $limit;
		
		$calendars = Calendar::orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($calendars);
	}

	public function getCalendarDate(Request $request){
		$month = date('m',strtotime($request->date));
		$year  = date('Y',strtotime($request->date));
		$end_day_month = date("t", strtotime($request->date));

		$filter_start_date = $year.'-'.$month.'-01';
		$filter_end_date 	= $year.'-'.$month.'-'.$end_day_month;
		$calendars = Calendar::whereBetween('start_date', array($filter_start_date, $filter_end_date))->get();
		return response()->json($calendars);
	}

	public function getEvent(Request $request){
		$calendars = Calendar::where('start_date','<=', $request->date)->where('end_date','>=', $request->date)->get();
		return response()->json($calendars);
	}

	/**
	 * Show the form for creating a new Calendar.
	 * GET|HEAD /calendars/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Calendar in storage.
	 * POST /calendars
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Calendar::$rules) > 0)
			$this->validateRequestOrFail($request, Calendar::$rules);

		$input = $request->all();

		$calendars = $this->calendarRepository->create($input);

		return $this->sendResponse($calendars->toArray(), "Calendar saved successfully");
	}

	/**
	 * Display the specified Calendar.
	 * GET|HEAD /calendars/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$calendar = $this->calendarRepository->apiFindOrFail($id);

		return $this->sendResponse($calendar->toArray(), "Calendar retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Calendar.
	 * GET|HEAD /calendars/{id}/edit
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
	 * Update the specified Calendar in storage.
	 * PUT/PATCH /calendars/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Calendar $calendar */
		$calendar = $this->calendarRepository->apiFindOrFail($id);

		$result = $this->calendarRepository->updateRich($input, $id);

		$calendar = $calendar->fresh();

		return $this->sendResponse($calendar->toArray(), "Calendar updated successfully");
	}

	/**
	 * Remove the specified Calendar from storage.
	 * DELETE /calendars/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->calendarRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Calendar deleted successfully");
	}
}
