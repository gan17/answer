@extends('layouts.app')
@section('title','アンケート一覧')
@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-12"><br />

     <!-- 検索部分 -->
      <div class="well">
       <form method="post" action="" enctype="multipart/form-data">
         {{csrf_field()}}
         <table>
            <tr>
              <td style="width:40%">
                氏名<input type="text" name="fullname" class="form-control" value="" placeholder="入力してください" />
              </td>
              <td>年代
                <select name="age_id" class="form-control">
                   <option value="0">選択して下さい</option>
                   <option value="1">10代以下</option>
                   <option value="2">20代</option>
                   <option value="3">30代</option>
                   <option value="4">40代</option>
                   <option value="5">50代</option>
                   <option value="6">60代以上</option>
               </select>
             </td>
              <td>性別
                <div class="form-group">
                  <input type="radio" name="all" value="0" checked> すべて
                  <input type="radio" name="gender" value="1"> 男性　
                  <input type="radio" name="gender" value="2"> 女性<br>
                </div>
              </td>
          </tr>
          <tr>
              <td>登録日　<input type="text" name="form" class="form-control" value="" placeholder="年/月/日" /></td>
              <td>〜<input type="text" name="to" class="form-control" value="" placeholder="年/月/日" /></td>
              <td>メール送信許可  <input type="checkbox" name="is_send_email"  value="1">　許可のみ<br></td>
          </tr>
          <tr>
              <td>キーワード<input type="text" name="email" class="form-control" value="" placeholder="キーワードを入力" /></td>
              <td></td>
              <td></td>
          </tr>
        </table>

       <div class="form-group" align="center">
         <br/>
         <input type="submit" class="btn btn-default" value=" リセット "/>
         <input type="submit" class="btn btn-success" value=" 検索 "/>
       </div>

       </form>
　　</div>

    <!-- アンケート一覧部分 -->
    <br/><br/>
    <input type="submit" class="btn btn-danger" value=" 選択したアンケートを削除 "/>
        <table class="table">
          <thead >
            <tr>
              <th scope="col">全選択</th>
              <th scope="col">ID</th>
              <th scope="col">氏名</th>
              <th scope="col">性別</th>
              <th scope="col">年代</th>
              <th scope="col">内容</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          @foreach($answers as $row)
            <tr>
              <th><input type="checkbox" name="is_send_email"  value="1">　選択</th>
              <th scope="row"><span class="badge">{{$row['id']}}</span></th>
              <td>{{$row['fullname']}}</td>
              <td>{{$row['gender']}}</td>
              <td>{{$row['age_id']}}</td>
              <td>{!! nl2br(htmlspecialchars($row['feedback'], ENT_QUOTES, 'UTF-8', false), false) !!}</td>
              <td>
                <a href="{{action('AnswersController@show',$row['id'])}}" ><button type="submit" class="btn btn-primary">編集</button></a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
    </div>
  </div>
</div>

@endsection
