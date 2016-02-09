<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\UserRepository;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as AppBaseController;
use Response;
use Validator;
use Auth;

class UserAPIController extends AppBaseController
{
	/** @var  UserRepository */
	private $userRepository;

	function __construct(UserRepository $userRepo)
	{
		$this->userRepository = $userRepo;
	}

	/**
	 * Display a listing of the User.
	 * GET|HEAD /users
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$offset  = $request->page ? $request->page : 1;
		$limit   = $request->limit ? $request->limit : 12;

		$offset  = ($offset - 1) * $limit;
		
		$posts = User::orderBy('id','desc')->offset($offset)->limit($limit)->get();
				
		return response()->json($posts);
	}

	public function login(Request $request){
		$validator = Validator::make($request->all(), [
            'username'     => 'required',
            'password'     => 'required',
        ]);

        if ($validator->fails()) {
            if($validator->errors()->has('username')){
                return response()->json($validator->errors()->first('username'), 400);
            }
            if($validator->errors()->has('password')){
                return response()->json($validator->errors()->first('password'), 400);
            }
        }

		$input = $request->all();

		if(Auth::attempt($input)){
            if(Auth::check()){
            	$role = Role::where('userId', Auth::user()->objectId)->first();
            	$user = Auth::user();
            	if($role)
            		$user['role'] = $role->name;
            	else
            		$user['role'] = 'User';
                return response()->json($user);
            }
        }else{
        	return response()->json("Invalid username and password.");
        }
}

	/**
	 * Show the form for creating a new User.
	 * GET|HEAD /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created User in storage.
	 * POST /users
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(User::$rules) > 0){
			$validator =  $this->validateRequestOrFail($request, User::$rules);
			if($validator){
				return $validator;
			}
		}

		$input = $request->all();

		$input['objectId'] = str_random(10);
		$input['password'] = bcrypt($input['password']);

		$users = $this->userRepository->create($input);

		return $this->sendResponse($users->toArray(), "User saved successfully");
	}

	public function postUploadImage(Request $request){
        $validator = Validator::make($request->all(), [
            'image'     => 'required',
        ]);

        if ($validator->fails()) {
            if($validator->errors()->has('image')){
                return response()->json($validator->errors()->first('image'), 400);
            }
        }

        $photoname = $this->uploadImage($request->image, '/users_photo/');
        
        return response()->json($photoname);
    }

	/**
	 * Display the specified User.
	 * GET|HEAD /users/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$user = $this->userRepository->apiFindOrFail($id);

		return $this->sendResponse($user->toArray(), "User retrieved successfully");
	}

	/**
	 * Show the form for editing the specified User.
	 * GET|HEAD /users/{id}/edit
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
	 * Update the specified User in storage.
	 * PUT/PATCH /users/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var User $user */
		$user = $this->userRepository->apiFindOrFail($id);

		$result = $this->userRepository->updateRich($input, $id);

		$user = $user->fresh();

		return $this->sendResponse($user->toArray(), "User updated successfully");
	}

	/**
	 * Remove the specified User from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->userRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "User deleted successfully");
	}
}
