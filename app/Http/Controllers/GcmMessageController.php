<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateGcmMessageRequest;
use App\Http\Requests\UpdateGcmMessageRequest;
use App\Libraries\Repositories\GcmMessageRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\User;
use App\Models\Gcm;
use PushNotification;

class GcmMessageController extends AppBaseController
{

	/** @var  GcmMessageRepository */
	private $gcmMessageRepository;

	function __construct(GcmMessageRepository $gcmMessageRepo)
	{
		$this->gcmMessageRepository = $gcmMessageRepo;
	}

	/**
	 * Display a listing of the GcmMessage.
	 *
	 * @return Response
	 */
	public function index()
	{
		$gcmMessages = $this->gcmMessageRepository->paginate(10);

		return view('gcmMessages.index')
			->with('gcmMessages', $gcmMessages);
	}

	/**
	 * Show the form for creating a new GcmMessage.
	 *
	 * @return Response
	 */
	public function create()
	{
		$users = User::all();
		dd(count($users));
		return view('gcmMessages.create')->with(['users'=>$users]);
	}

	/**
	 * Store a newly created GcmMessage in storage.
	 *
	 * @param CreateGcmMessageRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateGcmMessageRequest $request)
	{
		$input = $request->all();

		$gcmMessage = $this->gcmMessageRepository->create($input);

		if($request->file('image')){
			$uploadImage = $this->uploadImage($request->file('image'),'/gcms_photo/');
			$input['image'] = $uploadImage['resize_url'][0];
		}

		$device_list = [];
		if($input['user_id'] != 'All'){
			$gcm = Gcm::where('user_id', $input['user_id'])->first();
			$device_list[] = PushNotification::Device($gcm->reg_id);
			
		}else{
			$gcm = Gcm::all();
			foreach ($gcm as $key => $value) {
				$device_list[] = PushNotification::Device($value->reg_id);
	  		}
		}

		$devices = PushNotification::DeviceCollection($device_list);
		$message = PushNotification::Message(json_encode($input),array());

		$collection = PushNotification::app('appNameAndroid')
		    ->to($devices)
		    ->send($message);

		Flash::success('GcmMessage saved successfully.');

		return redirect(route('gcmMessages.index'));
	}

	/**
	 * Display the specified GcmMessage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$gcmMessage = $this->gcmMessageRepository->find($id);

		if(empty($gcmMessage))
		{
			Flash::error('GcmMessage not found');

			return redirect(route('gcmMessages.index'));
		}

		return view('gcmMessages.show')->with('gcmMessage', $gcmMessage);
	}

	/**
	 * Show the form for editing the specified GcmMessage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$gcmMessage = $this->gcmMessageRepository->find($id);

		if(empty($gcmMessage))
		{
			Flash::error('GcmMessage not found');

			return redirect(route('gcmMessages.index'));
		}

		$users = User::all();

		return view('gcmMessages.edit')->with(['gcmMessage' => $gcmMessage, 'users'=>$users]);
	}

	/**
	 * Update the specified GcmMessage in storage.
	 *
	 * @param  int              $id
	 * @param UpdateGcmMessageRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateGcmMessageRequest $request)
	{
		$gcmMessage = $this->gcmMessageRepository->find($id);

		if(empty($gcmMessage))
		{
			Flash::error('GcmMessage not found');

			return redirect(route('gcmMessages.index'));
		}

		$this->gcmMessageRepository->updateRich($request->all(), $id);

		Flash::success('GcmMessage updated successfully.');

		return redirect(route('gcmMessages.index'));
	}

	/**
	 * Remove the specified GcmMessage from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$gcmMessage = $this->gcmMessageRepository->find($id);

		if(empty($gcmMessage))
		{
			Flash::error('GcmMessage not found');

			return redirect(route('gcmMessages.index'));
		}

		$this->gcmMessageRepository->delete($id);

		Flash::success('GcmMessage deleted successfully.');

		return redirect(route('gcmMessages.index'));
	}
}
