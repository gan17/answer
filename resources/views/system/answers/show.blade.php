@extends('layouts.app')
@section('title','内容確認')
@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-12"><br />
    <h3 align="left">アンケート管理システム</h3><br />
      <table class="table">
        <tr>
          <td style="width:25%">ID</td>
          <td>{{$answers->id}}</td>
        </tr>

        <tr>
          <td>名前</td>
          <td>{{$answers->fullname}}</td>
        </tr>

        <tr>
          <td>性別</td>
          <td>{{$answers->gender}}</td>
        </tr>

        <tr>
          <td>年代</td>
          <td>{{$answers->age_id}}</td>
        </tr>

        <tr>
          <td>メールアドレス</td>
          <td>{{$answers->email}}</td>
        </tr>

        <tr>
          <td>メール送信可否</td>
          <td>{{$answers->is_send_email}}</td>
        </tr>

        <tr>
          <td>ご意見</td>
          <td>{!! nl2br(htmlspecialchars($answers->feedback, ENT_QUOTES, 'UTF-8', false), false) !!}</td>
        </tr>

        <tr>
          <td>登録日時</td>
          <td>{{$answers->created_at}}</td>
        </tr>
    </table>

    <div class="form-group" align="center">

      <form method="post" action="{{URL::previous()}}" enctype="multipart/form-data">
        {{csrf_field()}}

        <!-- 一覧画面に戻る -->
        <a href="{{ url('system/answers')}}" class="btn btn-success">一覧に戻る</a>

        <!--  アンケート削除する -->
        <button type="submit" name="action" value="back" class="btn btn-danger">削除</button>
      </form>

    </div>

    </div>
  </div>
</div>

@endsection
