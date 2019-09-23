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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function edit(answers $answers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, answers $answers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function destroy(answers $answers)
    {
        //
    }
}
