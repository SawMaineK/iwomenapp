<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCalendarRequest;
use App\Http\Requests\UpdateCalendarRequest;
use App\Libraries\Repositories\CalendarRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class CalendarController extends AppBaseController
{

	/** @var  CalendarRepository */
	private $calendarRepository;

	function __construct(CalendarRepository $calendarRepo)
	{
		$this->calendarRepository = $calendarRepo;
	}

	/**
	 * Display a listing of the Calendar.
	 *
	 * @return Response
	 */
	public function index()
	{
		$calendars = $this->calendarRepository->paginate(10);

		return view('calendars.index')
			->with('calendars', $calendars);
	}

	/**
	 * Show the form for creating a new Calendar.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('calendars.create');
	}

	/**
	 * Store a newly created Calendar in storage.
	 *
	 * @param CreateCalendarRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCalendarRequest $request)
	{
		$input = $request->all();

		$input['objectId'] = str_random(10);

		$calendar = $this->calendarRepository->create($input);

		Flash::success('Calendar saved successfully.');

		return redirect(route('calendars.index'));
	}

	/**
	 * Display the specified Calendar.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$calendar = $this->calendarRepository->find($id);

		if(empty($calendar))
		{
			Flash::error('Calendar not found');

			return redirect(route('calendars.index'));
		}

		return view('calendars.show')->with('calendar', $calendar);
	}

	/**
	 * Show the form for editing the specified Calendar.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$calendar = $this->calendarRepository->find($id);

		if(empty($calendar))
		{
			Flash::error('Calendar not found');

			return redirect(route('calendars.index'));
		}

		return view('calendars.edit')->with('calendar', $calendar);
	}

	/**
	 * Update the specified Calendar in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCalendarRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCalendarRequest $request)
	{
		$calendar = $this->calendarRepository->find($id);

		if(empty($calendar))
		{
			Flash::error('Calendar not found');

			return redirect(route('calendars.index'));
		}

		$this->calendarRepository->updateRich($request->all(), $id);

		Flash::success('Calendar updated successfully.');

		return redirect(route('calendars.index'));
	}

	/**
	 * Remove the specified Calendar from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$calendar = $this->calendarRepository->find($id);

		if(empty($calendar))
		{
			Flash::error('Calendar not found');

			return redirect(route('calendars.index'));
		}

		$this->calendarRepository->delete($id);

		Flash::success('Calendar deleted successfully.');

		return redirect(route('calendars.index'));
	}
}
