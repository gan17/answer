@extends('front.layouts.app')
@section('title','システムへのご意見をお聞かせください')
@section('content')

@if(count($errors) > 0)

@endif
<div class="container">
  <div class="row">
    <div class="col-md-12"><br />
    <h3 align="center">システムへのご意見を聞かせてください</h3><br />
    <form method="post" action="{{route('confirm')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <table align="center">
        <tr>
          <td style="width:25%">名前 <label style="color:red">※</label></td>
          <td>
            <div class="form-group">
              <input type="text" name="fullname" class="form-control" value="{{ old('fullname') }}" placeholder="入力してください" />
              @if($errors->has('fullname'))
              <label style="color:red">※この項目は必要です</label>
              @endif
            </div>
          </td>
        </tr>

        <tr>
          <td>性別 <label style="color:red">※</label></td>
          <td>
            <div class="form-group">
              <input type="radio" name="gender" value="1" checked> 男性　
              <input type="radio" name="gender" value="2"> 女性<br>

            </div>
          </td>
        </tr>

        <tr>
          <td>年代 <label style="color:red">※</label></td>
          <td>

            <select name="age_id" class="form-control">
              <option value="0">選択して下さい</option>
              @foreach($ages as $age)
              <option value="{{$age['sort']}}">{{$age['age']}}</option>
              @endforeach
            </select>

            @if($errors->has('age_id'))
            <label style="color:red">※この項目は必要です</label>
            @endif
          </td>
        </tr>

        <tr>
          <td>メールアドレス <label style="color:red">※</label></td>
          <td><br/>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="入力してください" />
            @if($errors->has('email'))
            <label style="color:red">※この項目は必要です</label>
            @endif
          </td>
        </tr>

        <tr>
          <td>メール送信可否</td>
          <td><br>登録したメールアドレスにメールマガジンをお送りしてもよろしいですか？<br>
            <input type="checkbox" name="is_send_email"  value="1" checked> 送信を許可します<br>
          </td>
        </tr>

        <tr>
          <td>ご意見</td>
          <td><br/>
            <textarea name="feedback" rows="5" cols="30" class="form-control" value="{{ old('feedback') }}" placeholder="入力してください" ></textarea>
          </td>
        </tr>
    </table>

    <div class="form-group" align="center">
      <br/>
      <input type="submit" class="btn btn-primary" value=" 確認 "/>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    </form>

    </div>
  </div>
</div>

@endsection
