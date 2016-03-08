<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateEmailRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Libraries\Repositories\EmailRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use Mail;

class EmailController extends AppBaseController
{

	/** @var  EmailRepository */
	private $emailRepository;

	function __construct(EmailRepository $emailRepo)
	{
		$this->emailRepository = $emailRepo;
	}

	/**
	 * Display a listing of the Email.
	 *
	 * @return Response
	 */
	public function index()
	{
		$emails = $this->emailRepository->paginate(10);

		return view('emails.index')
			->with('emails', $emails);
	}

	/**
	 * Show the form for creating a new Email.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('emails.create');
	}

	/**
	 * Store a newly created Email in storage.
	 *
	 * @param CreateEmailRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateEmailRequest $request)
	{
		$input = $request->all();

		$email = $this->emailRepository->create($input);

		$data = ['name'=>$input['name'],'email'=>$input['email'],'message'=>$input['message']]

        Mail::send('emails.feedback', $data, function ($m){
            $m->to('iwomenapp@gmail.com', 'iWomen Team');
            $m->subject('There is a new message from your user.');
        });

		Flash::success('Email saved successfully.');

		return redirect(route('emails.index'));
	}

	/**
	 * Display the specified Email.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$email = $this->emailRepository->find($id);

		if(empty($email))
		{
			Flash::error('Email not found');

			return redirect(route('emails.index'));
		}

		return view('emails.show')->with('email', $email);
	}

	/**
	 * Show the form for editing the specified Email.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$email = $this->emailRepository->find($id);

		if(empty($email))
		{
			Flash::error('Email not found');

			return redirect(route('emails.index'));
		}

		return view('emails.edit')->with('email', $email);
	}

	/**
	 * Update the specified Email in storage.
	 *
	 * @param  int              $id
	 * @param UpdateEmailRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateEmailRequest $request)
	{
		$email = $this->emailRepository->find($id);

		if(empty($email))
		{
			Flash::error('Email not found');

			return redirect(route('emails.index'));
		}

		$this->emailRepository->updateRich($request->all(), $id);

		Flash::success('Email updated successfully.');

		return redirect(route('emails.index'));
	}

	/**
	 * Remove the specified Email from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$email = $this->emailRepository->find($id);

		if(empty($email))
		{
			Flash::error('Email not found');

			return redirect(route('emails.index'));
		}

		$this->emailRepository->delete($id);

		Flash::success('Email deleted successfully.');

		return redirect(route('emails.index'));
	}
}
