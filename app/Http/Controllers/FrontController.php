<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    #入力画面
    public function index()
    {
        return view('front.index');
    }

    //確認画面
    public function confirm(Request $request)
    {
      $validate_rule = [
        'fullname' => 'required',
        'age_id' => 'required',
        'email' => 'email',
        'feedback' => 'max:10000',
      ];

      $fullname = $request->input('fullname');
      $gender = $request->input('gender');
      $age_id = $request->input('age_id');
      $email = $request->input('email');
      $is_send_email = $request->input('is_send_email');
      $feedback = $request->input('feedback');

      $this->validate($request,$validate_rule);
      return view('front.confirm', compact('fullname', 'gender','age_id','email','is_send_email','feedback'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, ['fullname' => 'required','gender' => 'required','age_id' => 'required','email' => 'required','is_send_email' => 'required','feedback' => 'required']);

      $answer = new Answer(
      [
        'fullname' => $request->get('fullname'),
        'gender' => $request->get('gender'),
        'age_id' => $request->get('age_id'),
        'email' => $request->get('email'),
        'is_send_email' => $request->get('is_send_email'),
        'feedback' => $request->get('feedback')
      ]
      );

      $answer->save();
      return view('front.index')->with('success', '送信しました！');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
