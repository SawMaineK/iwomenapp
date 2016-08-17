<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\EmailRepository;
use App\Models\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;
use Mail;

class EmailAPIController extends AppBaseController
{
	/** @var  EmailRepository */
	private $emailRepository;

	function __construct(EmailRepository $emailRepo)
	{
		$this->emailRepository = $emailRepo;
	}

	/**
	 * Display a listing of the Email.
	 * GET|HEAD /emails
	 *
	 * @return Response
	 */
	public function index()
	{
		$emails = $this->emailRepository->all();

		return $this->sendResponse($emails->toArray(), "Emails retrieved successfully");
	}

	/**
	 * Show the form for creating a new Email.
	 * GET|HEAD /emails/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Email in storage.
	 * POST /emails
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Email::$rules) > 0)
			$this->validateRequestOrFail($request, Email::$rules);

		$input = $request->all();

		$emails = $this->emailRepository->create($input);

		// Data to be used on the email view
        $data = array(
            'fromName'    => $emails->name,
            'fromEmail'        => $emails->email,
            'feedbackMessage'       => $emails->message
        );
        
        // Send the activation code through email
        Mail::send('emails.feedback', $data, function ($m){
            $m->to('iwomenapp@gmail.com', 'iWomen Team');
            $m->to('gatti.eleonora@gmail.com', 'iWomen Team');
            $m->subject('Website Feedback');
        });

		return $this->sendResponse($emails->toArray(), "Email saved successfully");
	}

	/**
	 * Display the specified Email.
	 * GET|HEAD /emails/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$email = $this->emailRepository->apiFindOrFail($id);

		return $this->sendResponse($email->toArray(), "Email retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Email.
	 * GET|HEAD /emails/{id}/edit
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
	 * Update the specified Email in storage.
	 * PUT/PATCH /emails/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Email $email */
		$email = $this->emailRepository->apiFindOrFail($id);

		$result = $this->emailRepository->updateRich($input, $id);

		$email = $email->fresh();

		return $this->sendResponse($email->toArray(), "Email updated successfully");
	}

	/**
	 * Remove the specified Email from storage.
	 * DELETE /emails/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->emailRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Email deleted successfully");
	}
}
