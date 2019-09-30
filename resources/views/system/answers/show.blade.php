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
          <td>@if($answers->gender == 1)
                  男性
              @else
                  女性
              @endif
          </td>
        </tr>

        <tr>
          <td>年代</td>
          <td>{{$answers->age}}</td>
        </tr>

        <tr>
          <td>メールアドレス</td>
          <td>{{$answers->email}}</td>
        </tr>

        <tr>
          <td>メール送信可否</td>
          <td>@if($answers->is_send_email == 1)
                  送信許可
              @else
                  送信不許可
              @endif
          </td>
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


      <form method="post" action="{{action('AnswersController@destroy',$answers['id'])}}" onsubmit="return(confirm('削除してもよろしいですか?'))">
        {{ method_field('DELETE')}}
        {{csrf_field()}}
        <!-- 一覧画面に戻る -->
        <a href="javascript:history.back();" class="btn btn-success">一覧に戻る</a>
        <button type="submit" class="btn btn-danger">削除</button>
      </form>

    </div>

    </div>
  </div>
</div>

@endsection
