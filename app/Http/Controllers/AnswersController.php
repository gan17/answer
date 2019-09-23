<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

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
    public function index()
    {
      $answers = Answer::Paginate(10);
      return view('system.answers.index',compact('answers'));
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
