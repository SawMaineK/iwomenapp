<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CompetitionQuestion;
use App\CompetitionGroupUser;
use App\Models\User;


class CompetitionQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $questions =CompetitionQuestion::orderBy('id','desc')->get();

        return view('competitionquestion.list', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('competitionquestion.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // create the validation rules ------------------------
        $rules = array(
            'question'                  => 'required',                        // just a normal required validation
            'question_mm'               => 'required',         // required and must be unique in the user table
            'description'               => 'required',
            'description_mm'            => 'required',
            'instruction'               => 'required',         
            'instruction_mm'            => 'required',         
            'start_date'                => 'required',         
            'end_date'                  => 'required',         
            'groupusers'                => 'required',         
        );
        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make($request->all(), $rules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {
            // get the error messages from the validator
            $messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return redirect('admin/competition-question/create')->withErrors($validator)->withInput();
        } 

        try {
            DB::beginTransaction();
            $question = new CompetitionQuestion();
            $question->question = $request->question;
            $question->question_mm = $request->question_mm;
            $question->description = $request->description;
            $question->description_mm = $request->description_mm;
            $question->instruction_about_game       = $request->instruction;
            $question->instruction_about_game_mm    = $request->instruction_mm;
            $question->group_description            = $request->group_description;
            $question->group_description_mm         = $request->group_description_mm;
            $question->answer_submit_description    = $request->answer_submit_description;
            $question->answer_submit_description_mm = $request->answer_submit_description_mm;
            $question->start_date       = date('Y-m-d H:i:s',strtotime($request->start_date));
            $question->end_date         = date('Y-m-d H:i:s',strtotime($request->end_date));
            $question->user_count       = $request->groupusers;
            $groupuserscount            = $request->groupusers;
            $question->save();
            $all_user = $request->all_user;

            $users = User::all();

            if($users){     

                $group_users = array();

                foreach ($users as $i => $user) {

                    //Grouping
                    if($all_user){
                        if(isset($user['username']) && $user['username'])
                           $group_users[$user['username']][] = $user;

                    }else{
                        if(isset($user['tlg_city_address']) && $user['tlg_city_address'])
                           $group_users[$user['tlg_city_address']][] = $user;   
                    }
                   
                }

                $group_index = 1;
                $i = 0;
                foreach ($group_users as $key => $city) {
                    foreach ($city as $user) {
                        
                        if($i % $groupuserscount == 0){
                            $group_name =  'Group - '. ($group_index++);
                        }

                        $group_user = new CompetitionGroupUser();
                        $group_user->group_name = $group_name;
                        $group_user->user_id = $user['id'];
                        $group_user->username = $user['username'];
                        $group_user->phone = $user['phoneNo'];
                        $group_user->profile_img = isset($user['user_profile_img']) ? json_encode($user['user_profile_img']) : null;
                        $group_user->group_city = $user['tlg_city_address'];
                        $group_user->competition_question_id = $question->id;
                        $group_user->save();

                        $i++;
                    }
                }
                
            }else{
                DB::rollBack();
                return response()->json('Something went wrong in parse.', 400);
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json('Something went wrong.', 400);
        }

        return redirect('/admin/competition-question');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $question=CompetitionQuestion::with(array(
                                        'competitiongroupusers'=>function($query){
                                            $query->addSelect('id','competition_question_id','group_name')->get();
                                        }))
                                        ->find($id);

        return view('competitionquestion.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // create the validation rules ------------------------
        $rules = array(
            'question'                  => 'required',                        // just a normal required validation
            'question_mm'               => 'required',         // required and must be unique in the user table
            'description'               => 'required',
            'description_mm'            => 'required',
            'instruction'               => 'required',         
            'instruction_mm'            => 'required',         
            'groupusers'                => 'required',         
        );
        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make($request->all(), $rules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {
            // get the error messages from the validator
            $messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return redirect('admin/competition-question/create')->withErrors($validator)->withInput();
        } 


        try {
            DB::beginTransaction();
            $question = CompetitionQuestion::find($id);
            $question->question = $request->question;
            $question->question_mm = $request->question_mm;
            $question->description = $request->description;
            $question->description_mm = $request->description_mm;
            $question->instruction_about_game = $request->instruction;
            $question->instruction_about_game_mm = $request->instruction_mm;
            $question->group_description            = $request->group_description;
            $question->group_description_mm         = $request->group_description_mm;
            $question->answer_submit_description    = $request->answer_submit_description;
            $question->answer_submit_description_mm = $request->answer_submit_description_mm;
            if($request->start_date !='')
                $question->start_date = date('Y-m-d H:i:s', strtotime($request->start_date));
            if($request->end_date !='')
                $question->end_date   = date('Y-m-d H:i:s', strtotime($request->end_date));
            $question->user_count       = $request->groupusers;
            $groupuserscount          =$request->groupusers;
            $question->update();

            $all_user = $request->all_user;

            $users = User::all();

            if($users){     

                $group_users = array();

                foreach ($users as $i => $user) {

                    //Grouping
                    if($all_user){
                        if(isset($user['username']) && $user['username'])
                           $group_users[$user['username']][] = $user;

                    }else{
                        if(isset($user['tlg_city_address']) && $user['tlg_city_address'])
                           $group_users[$user['tlg_city_address']][] = $user;   
                    }
                    
                   
                }

                $group_index = 1;
                $i = 0;

                CompetitionGroupUser::where('competition_question_id',$id)->delete();
                
                foreach ($group_users as $key => $city) {
                    foreach ($city as $user) {
                        
                        if($i % $groupuserscount == 0){
                            $group_name =  'Group - '. ($group_index++);
                        }

                        $group_user = new CompetitionGroupUser();
                        $group_user->group_name = $group_name;
                        $group_user->user_id = $user['id'];
                        $group_user->username = $user['username'];
                        $group_user->phone = $user['phoneNo'];
                        $group_user->profile_img = isset($user['user_profile_img']) ? json_encode($user['user_profile_img']) : null;
                        $group_user->group_city = $user['tlg_city_address'];
                        $group_user->competition_question_id = $question->id;
                        $group_user->save();

                        $i++;
                    }
                }
                
            }else{
                DB::rollBack();
                return response()->json('Something went wrong in parse.', 400);
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json('Something went wrong.', 400);
        }

        return redirect('/admin/competition-question')->withMessages('Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        CompetitionQuestion::where('id',$id)->delete();
        return redirect('/admin/competition-question')->withMessages('Successfully deleted.');
    }
}
