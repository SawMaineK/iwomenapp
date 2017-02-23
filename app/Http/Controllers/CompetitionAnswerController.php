<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CompetitionGroupUser;
use App\CompetitionAnswer;
use App\Models\MutipleAnswer;
use App\Models\MutipleQuestion;
use URL;

class CompetitionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $query=$request->q;
        $status=1;
        $title="Competition Answer List (Submitted)";
        if($query=='unsubimt'){
            $title="Competition Answer List (Unsubmitted)";
            $status=0;
        }
        $answerslist =CompetitionAnswer::where('status',$status)->with('competitiongroupuser')->orderBy('updated_at','desc')->get();
        $answers=array();
        if($answerslist){
            $grouparray=array();
            foreach ($answerslist as $key => $value) {
                if(isset($value->competitiongroupuser->group_name))
                    $grouparray[$value->competitiongroupuser->group_name][]=$value->toarray();
                $answers=$grouparray;
            }
        }
        // return response()->json($answers);
        return view('competitionanswer.list', compact('answers','title'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
         $answer=CompetitionAnswer::with('competitiongroupuser')->where('id',$id)->first();
         return view('competitionanswer.edit', compact('answer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, Request $request)
    {
        $objanswer=CompetitionAnswer::find($id);
        $objanswer->correct=1;
        $objanswer->update();
        return redirect(URL::previous());
    }


    public function correct($id){

        $multipleAnswer = MutipleAnswer::find($id);
        if($multipleAnswer){
            $competitionAnswer = new CompetitionAnswer();
            $multipleQuestion = MutipleQuestion::where('id', $multipleAnswer->mutiple_question_id)->first();
            $competitionAnswer->question_id = $multipleQuestion->question_id;
            $competitionAnswer->competition_group_user_id = $multipleAnswer->user_id;
            $competitionAnswer->mutiple_answer_id = $multipleAnswer->id;
            $competitionAnswer->answer = $multipleAnswer->answer;
            $competitionAnswer->answer_mm = $multipleAnswer->answer;
            $competitionAnswer->status = 1;
            $competitionAnswer->correct = 1;
            $competitionAnswer->save();

            return redirect(URL::previous());
        }
    }

    public function uncorrect($id){
        $multipleAnswer = MutipleAnswer::find($id);
        if($multipleAnswer){
            $objanswer=CompetitionAnswer::where('mutiple_answer_id', $multipleAnswer->id)->first();
            $objanswer->delete();
            return redirect(URL::previous());
        }
        
        // return redirect(URL::previous());
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
        $objanswer=CompetitionAnswer::find($id);
        $objanswer->answer= $request->answer;
        $objanswer->answer_mm= $request->answer_mm;
        $objanswer->update();

        $group = CompetitionGroupUser::find($objanswer->competition_group_user_id);
        if($group){
            $group->group_name = $request->group_name;
            $group->group_name_mm = $request->group_name_mm;
            $group->update();
        }
        
        return redirect(URL::previous());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
