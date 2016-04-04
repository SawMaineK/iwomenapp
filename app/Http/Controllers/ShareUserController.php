<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateShareUserRequest;
use App\Http\Requests\UpdateShareUserRequest;
use App\Libraries\Repositories\ShareUserRepository;
use App\Models\User;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ShareUserController extends AppBaseController
{

	/** @var  ShareUserRepository */
	private $shareUserRepository;

	function __construct(ShareUserRepository $shareUserRepo)
	{
		$this->shareUserRepository = $shareUserRepo;
	}

	/**
	 * Display a listing of the ShareUser.
	 *
	 * @return Response
	 */
	public function index()
	{
		$shareUsers = $this->shareUserRepository->paginate(10);

		return view('shareUsers.index')
			->with('shareUsers', $shareUsers);
	}

	/**
	 * Show the form for creating a new ShareUser.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('shareUsers.create');
	}

	/**
	 * Store a newly created ShareUser in storage.
	 *
	 * @param CreateShareUserRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateShareUserRequest $request)
	{
		$input = $request->all();

		$shareUser = $this->shareUserRepository->create($input);

		$user = User::where('objectId', $shareUser->share_objectId)->first();
		if($user){
			$user->points += 10;
			$user->update();
		}

		Flash::success('ShareUser saved successfully.');

		return redirect(route('shareUsers.index'));
	}

	/**
	 * Display the specified ShareUser.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$shareUser = $this->shareUserRepository->find($id);

		if(empty($shareUser))
		{
			Flash::error('ShareUser not found');

			return redirect(route('shareUsers.index'));
		}

		return view('shareUsers.show')->with('shareUser', $shareUser);
	}

	/**
	 * Show the form for editing the specified ShareUser.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$shareUser = $this->shareUserRepository->find($id);

		if(empty($shareUser))
		{
			Flash::error('ShareUser not found');

			return redirect(route('shareUsers.index'));
		}

		return view('shareUsers.edit')->with('shareUser', $shareUser);
	}

	/**
	 * Update the specified ShareUser in storage.
	 *
	 * @param  int              $id
	 * @param UpdateShareUserRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateShareUserRequest $request)
	{
		$shareUser = $this->shareUserRepository->find($id);

		if(empty($shareUser))
		{
			Flash::error('ShareUser not found');

			return redirect(route('shareUsers.index'));
		}

		$this->shareUserRepository->updateRich($request->all(), $id);

		Flash::success('ShareUser updated successfully.');

		return redirect(route('shareUsers.index'));
	}

	/**
	 * Remove the specified ShareUser from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$shareUser = $this->shareUserRepository->find($id);

		if(empty($shareUser))
		{
			Flash::error('ShareUser not found');

			return redirect(route('shareUsers.index'));
		}

		$this->shareUserRepository->delete($id);

		Flash::success('ShareUser deleted successfully.');

		return redirect(route('shareUsers.index'));
	}
}
