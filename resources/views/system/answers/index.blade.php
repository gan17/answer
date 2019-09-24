@extends('layouts.app')
@section('title','アンケート一覧')
@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-12"><br />

     <!-- 検索部分 -->
      <div class="well">
       <form method="GET" action="{{ URL('system/answers') }}" enctype="multipart/form-data">
         {{csrf_field()}}
         <table>
            <tr>
              <td style="width:40%">
                氏名<input type="text" name="s_fullname" class="form-control" placeholder="入力してください" />
              </td>
              <td>年代
               <select name="s_age_id" class="form-control">
                 <option value="">選択して下さい</option>
                 @if(isset($ages))

                   @foreach ($ages as $age)
                     <option value="{{ $age->sort }}">
                        {{ $age->age }}
                     </option>
                   @endforeach

                 @else
                   <p>not found..!</p>
                 @endif
               </select>
             </td>
              <td>性別
                <div class="form-group">
                  <input type="radio" name="s_gender" value="0" checked> すべて
                  <input type="radio" name="s_gender" value="1"> 男性　
                  <input type="radio" name="s_gender" value="2"> 女性<br>
                </div>
              </td>
          </tr>
          <tr>
              <td>登録日　<input type="text" name="s_date_from" class="form-control" value="" placeholder="年/月/日" /></td>
              <td>〜<input type="text" name="s_date_to" class="form-control" value="" placeholder="年/月/日" /></td>
              <td>メール送信許可  <input type="checkbox" name="s_is_send_email"  value="1">　許可のみ<br></td>
          </tr>
          <tr>
              <td>キーワード<input type="text" name="s_keyword" class="form-control"  placeholder="キーワードを入力" /></td>
              <td></td>
              <td></td>
          </tr>
        </table>

       <div class="form-group" align="center">
         <br/>
         <button onClick="window.location.reload();" class="btn btn-default" >リセット</button>
         <input type="submit" class="btn btn-success" value=" 検索 "/>
       </div>

       </form>
　　</div>

    <div class="form-group">
    @if(\Session::has('success'))
    <br />
      <div class="alert alert-info">
        <p align="center">{{ \Session::get('success')}}</p>
      </div>
    @endif
    </div>

    <div class="form-group">
      <table class="table table-borderless">
          <tr>
            <td align="left"><br><input type="submit" class="btn btn-danger" value=" 選択したアンケートを削除 "/></td>

            <td style="width:50%"  align="right">{{ '全&nbsp;'. $answers -> total() .'&nbsp;件中&nbsp;&nbsp;&nbsp;' . $answers -> firstItem() . ' ~ ' . $answers -> lastItem() . ' 件&nbsp;&nbsp; ' }}  {{ $answers -> render() }}</td>
          </tr>
      </table>
    </div>

        <table class="table table-hover">
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
          @if($answers->count())

            <!-- アンケート一覧 -->
            @foreach($answers as $row)
          <tbody>

            <tr>

              <th><input type="checkbox" name="is_send_email"  value="1">　選択</th>
              <th scope="row"><span class="badge">{{$row['id']}}</span></th>
              <td>{{$row['fullname']}}</td>
              <td>
                  @if($row['gender'] == 1)
                    男性
                  @else
                    女性
                  @endif
              </td>
              <td>@if($row['age_id'] == 1)
                    10代以下
                  @elseif($row['age_id'] == 2)
                    20代
                  @elseif($row['age_id'] == 3)
                    30代
                  @elseif($row['age_id'] == 4)
                    40代
                  @elseif($row['age_id'] == 5)
                    50代
                  @elseif($row['age_id'] == 6)
                    60代以上
                  @endif
              </td>
              <td>
                {{ strip_tags(str_limit($row['feedback'], 32, '...', '<br>')) }}</td>
              <td>
                <a href="{{action('AnswersController@show', $row['id'])}}" ><button type="submit" class="btn btn-primary">編集</button></a>
              </td>
            </tr>
          </tbody>
          @endforeach
          @else
                <div class="alert alert-warning">
                  <p align="center">該当するアンケートはありません</p>
                </div>
          @endif
        </table>
        <br><br>
    </div>
  </div>
</div>

@endsection
