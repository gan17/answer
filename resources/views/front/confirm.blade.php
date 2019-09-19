@extends('front.layouts.app')
@section('title','内容確認')
@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-12"><br />
    <h3 align="center">内容確認</h3><br />
      <table class="table">
        <tr>
          <td style="width:25%">名前</td>
          <td>{{$fullname}}</td>
        </tr>

        <tr>
          <td>性別</td>
          <td>@if($gender == 1)
                男性
              @else
                女性
              @endif
          </td>
        </tr>

        <tr>
          <td>年代</td>
          <td>@if($age_id == 1)
                10代以下
              @elseif($age_id == 2)
                20代
              @elseif($age_id == 3)
                30代
              @elseif($age_id == 4)
                40代
              @elseif($age_id == 5)
                50代
              @elseif($age_id == 6)
                60代以上
              @endif
          </td>
        </tr>

        <tr>
          <td>メールアドレス</td>
          <td>{{$email}}</td>
        </tr>

        <tr>
          <td>メール送信可否</td>
          <td>@if($is_send_email == 1)
                送信許可
              @else
                送信不許可
              @endif
          </td>
        </tr>

        <tr>
          <td>ご意見</td>
          <td>{!! nl2br(htmlspecialchars($feedback, ENT_QUOTES, 'UTF-8', false), false) !!}</td>
        </tr>
    </table>

    <div class="form-group" align="center">

      <form method="post" action="{{URL::previous()}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="fullname" class="form-control" value="{{ $fullname }}">
        <input type="hidden" name="gender" class="form-control" value="{{ $gender }}">
        <input type="hidden" name="age_id" class="form-control" value="{{ $age_id }}">
        <input type="hidden" name="email" class="form-control" value="{{ $email }}">
        <input type="hidden" name="is_send_email" class="form-control" value="{{ $is_send_email }}">
        <input type="hidden" name="feedback" class="form-control" value="{!! nl2br(htmlspecialchars($feedback, ENT_QUOTES, 'UTF-8', false), false) !!}">

        {{-- 入力画面に戻る --}}
        <a href="javascript:history.back();" class="btn btn-primary">再入力</a>

        {{-- アンケート保存する --}}
        <button type="submit" name="action" value="back" class="btn btn-success">送信</button>
      </form>

    </div>

    </div>
  </div>
</div>

@endsection
