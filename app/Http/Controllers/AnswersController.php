<?php

namespace App\Http\Controllers;

use App\Answer;
use Request;

//use Illuminate\Http\Request;

class AnswersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $s_fullname = Request::input('s_fullname');
      $s_gender = Request::input('s_gender');
      $s_age_id = Request::input('s_age_id');
      $s_is_send_email = Request::input('s_is_send_email');
      $s_keyword = Request::input('s_keyword');
      $s_date_from = Request::input('s_date_from');
      $s_date_to = Request::input('s_date_to');

      $query = Answer::query();

      if(!empty($s_fullname)) {
          $query->where('fullname', 'like', '%'.$s_fullname.'%');
      }
      if(!empty($s_gender)) {
          $query->where('gender', '=', $s_gender);
      }
      if(!empty($s_age_id)) {
          $query->where('age_id', '=', $s_age_id);
      }
      if(!empty($s_is_send_email)) {
          $query->where('is_send_email', '=', $s_is_send_email);
      }
      if(!empty($s_keyword)) {
          $query->where('email', 'like', '%'.$s_keyword.'%')
                ->orwhere('feedback', 'like', '%'.$s_keyword.'%');
      }
      if(!empty($s_date_from) and !empty($s_date_to)) {
          $query->whereBetween('created_at', [$s_date_from , $s_date_to]);
      }

      $answers = $query->Paginate(10);
      return view('system.answers.index', compact('answers', 's_fullname', 's_gender', 's_age_id', '$s_is_send_email', '$s_keyword', '$s_date_from', '$s_date_to'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $answers = Answer::find($id);
      return view('system.answers.show', compact('answers','id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $answers = Answer::find($id);
       $answers->delete();
       return redirect()->route('answers.index')->with('success', '削除しました');
    }

}
