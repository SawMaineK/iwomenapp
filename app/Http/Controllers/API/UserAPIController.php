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
use App\CompetitionQuestion;
use App\CompetitionGroupUser;

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
        	return response()->json(['error'=>'Invalid username and password.','error_mm' => 'သင္၏ အမည္ ႏွင့္ လွ်ိဳ႕ဝွက္ စာလံုး မွားေနပါသည္။'], 400);
        }
	}

	public function checkRole($id){
		$role = Role::where('userId', $id)->first();
		if($role){
			return response()->json($role->name);
		}
		return response()->json('User');
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

		$exist = User::where('username', $input['username'])->first();
		if($exist){
			return response()->json(['error'=>'This username is already exist.','error_mm' => 'အမည္တူရိွေနပါသည္။ အေနာက္တြင္ ဂဏန္း တစ္ခုခုထည့္ပါ။ ဥပမာ။။ Nyo Nyo1'], 400);
		}

		$input['objectId'] = str_random(10);
		
		$input['password'] = bcrypt($input['password']);

		$users = $this->userRepository->create($input);

		if(isset($input['tlg_city_address']) && $input['tlg_city_address'] && isset($input['isTlgTownshipExit']) && $input['isTlgTownshipExit']){
			$role = new Role();
			$role->name = 'TLGUSER';
			$role->userId = $users->objectId;
			$role->save();
			$users['role'] = $role->name;
		}else{
			$users['role'] = 'User';
		}
		//Check for game
		$competition_question = CompetitionQuestion::where('start_date','>',date('Y-m-d H:i:s'))->orwhere('end_date','>',date('Y-m-d H:i:s'))->orderBy('id','desc')->first();
		//return response()->json($competition_question);
		if($competition_question){
			$group_user = CompetitionGroupUser::where('competition_question_id',$competition_question->id)->orderBy('id','desc')->first();
			//dd($group_user);
			if($competition_question->user_count > 1){
				$group_user_count = CompetitionGroupUser::where('competition_question_id',$competition_question->id)->where('group_name',$group_user->group_name)->count();
				if($group_user_count == $competition_question->user_count){
					//Create New Group
					$group_name = explode(" - ", $group_user->group_name);
					if(count($group_name) > 1){
						$competition_group_user = new CompetitionGroupUser();
						$competition_group_user->group_name = $group_name[0].' - '.($group_name[1]  + 1);
						$competition_group_user->group_city = isset($users->tlg_city_address) ? $users->tlg_city_address : '';
						$competition_group_user->user_id = $users->id;
						$competition_group_user->username = $users->username;
						$competition_group_user->phone = $users->phoneNo;
						$competition_group_user->profile_img = isset($users->user_profile_img) ? $users->user_profile_img : '';
						$competition_group_user->competition_question_id = $competition_question->id;
						$competition_group_user->save();
					}
				}else{
					//Create in Existing Group
					$competition_group_user = new CompetitionGroupUser();
					$competition_group_user->group_name = $group_user->group_name;
					$competition_group_user->group_city = isset($users->tlg_city_address) ? $users->tlg_city_address : '';
					$competition_group_user->user_id = $users->id;
					$competition_group_user->username = $users->username;
					$competition_group_user->phone = $users->phoneNo;
					$competition_group_user->profile_img = isset($users->user_profile_img) ? $users->user_profile_img : '';
					$competition_group_user->competition_question_id = $competition_question->id;
					$competition_group_user->save();
				}
			}else{
				$group_name = explode(" - ", $group_user->group_name);
				if(count($group_name) > 1){
					$competition_group_user = new CompetitionGroupUser();
					$competition_group_user->group_name = $group_name[0].' - '.($group_name[1]  + 1);
					$competition_group_user->group_city = isset($users->tlg_city_address) ? $users->tlg_city_address : '';
					$competition_group_user->user_id = $users->id;
					$competition_group_user->username = $users->username;
					$competition_group_user->phone = $users->phoneNo;
					$competition_group_user->profile_img = isset($users->user_profile_img) ? $users->user_profile_img : '';
					$competition_group_user->competition_question_id = $competition_question->id;
					$competition_group_user->save();
				}
			}
		}


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

		if($input['password'])
			$input['password'] = bcrypt($input['password']);

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
