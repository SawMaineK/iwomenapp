<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Libraries\Repositories\RoleRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;
use App\Models\User;

class RoleController extends AppBaseController
{

	/** @var  RoleRepository */
	private $roleRepository;

	function __construct(RoleRepository $roleRepo)
	{
		$this->roleRepository = $roleRepo;
	}

	/**
	 * Display a listing of the Role.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = $this->roleRepository->paginate(10);
		foreach ($roles as $key => $value) {
			$roles[$key]['user'] = User::where('objectId', $value->userId)->first();
		}
		return view('roles.index')
			->with('roles',$roles);
	}

	/**
	 * Show the form for creating a new Role.
	 *
	 * @return Response
	 */
	public function create()
	{
		$users = User::all();
		$userlist = array();
		foreach ($users as $key => $value) {
			$userlist[$value->objectId] = $value->username;
		}

		return view('roles.create')->with(array('users' => $userlist));
	}

	/**
	 * Store a newly created Role in storage.
	 *
	 * @param CreateRoleRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateRoleRequest $request)
	{
		$input = $request->all();

		$input['objectId'] = str_random(10);

		$role = $this->roleRepository->create($input);

		Flash::success('Role saved successfully.');

		return redirect(route('roles.index'));
	}

	/**
	 * Display the specified Role.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$role = $this->roleRepository->find($id);

		if(empty($role))
		{
			Flash::error('Role not found');

			return redirect(route('roles.index'));
		}

		return view('roles.show')->with('role', $role);
	}

	/**
	 * Show the form for editing the specified Role.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$role = $this->roleRepository->find($id);

		if(empty($role))
		{
			Flash::error('Role not found');

			return redirect(route('roles.index'));
		}

		return view('roles.edit')->with('role', $role);
	}

	/**
	 * Update the specified Role in storage.
	 *
	 * @param  int              $id
	 * @param UpdateRoleRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateRoleRequest $request)
	{
		$role = $this->roleRepository->find($id);

		if(empty($role))
		{
			Flash::error('Role not found');

			return redirect(route('roles.index'));
		}

		$this->roleRepository->updateRich($request->all(), $id);

		Flash::success('Role updated successfully.');

		return redirect(route('roles.index'));
	}

	/**
	 * Remove the specified Role from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$role = $this->roleRepository->find($id);

		if(empty($role))
		{
			Flash::error('Role not found');

			return redirect(route('roles.index'));
		}

		$this->roleRepository->delete($id);

		Flash::success('Role deleted successfully.');

		return redirect(route('roles.index'));
	}
}
