@extends('layouts.app')
@section('title','アンケート一覧')
@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-12"><br />

     <!-- 検索部分 -->
      <div class="well">
        <form method="GET" action="{{route('answers.index')}}" enctype="multipart/form-data">
         {{csrf_field()}}
          <table>
            <tr>
              <td style="width:8%" align="center">氏名</td>
              <td style="width:20%">
                <div class="form-group">
                  <input type="text" name="s_fullname" class="form-control" value="{{ old('s_fullname') }}" placeholder="入力してください" />
                </div>
              </td>

              <td style="width:5%" align="center">年代</td>
              <td style="width:20%">
                <div class="form-group">
                  <select name="s_age_id" class="form-control">
                    <option value="">選択して下さい</option>
                    @if(isset($ages))

                      @foreach ($ages as $age)
                        <option value="{{ $age->sort }}" {!! old('s_age_id') == "$age->sort" ? 'selected="selected"' : '' !!}>
                            {{ $age->age }}
                        </option>
                      @endforeach

                    @else
                      <p>not found..!</p>
                    @endif
                  </select>
                </div>
              </td>

              <td style="width:10%" align="center">性別 </td>
              <td style="width:15%">
                <div class="form-group">
                  <input type="radio" name="s_gender" value="" {!! old('s_gender') == "" ? 'checked="checked"' : '' !!} checked> すべて
                  <input type="radio" name="s_gender" value="1" {!! old('s_gender') == "1" ? 'checked="checked"' : '' !!}>  男性　
                  <input type="radio" name="s_gender" value="2" {!! old('s_gender') == "2" ? 'checked="checked"' : '' !!}>  女性
                </div>
              </td>
            </tr>

            <tr>
              <td align="center">登録日　</td>
              <td>
                <div class="form-group">
                  　<input type="text" name="s_date_from" class="form-control" value="{{ old('s_date_from') }}" placeholder="年/月/日" />
                </div>
              </td>

              <td align="center">〜</td>
              <td>
                <div class="form-group">
                  <input type="text" name="s_date_to" class="form-control" value="{{ old('s_date_to')}}" placeholder="年/月/日" /></td>
                </div>
              </td>

              <td align="center">メール送信許可</td>
              <td>
                <div class="form-group">
                  <input type="checkbox" name="s_is_send_email" value="1" {!! old('s_is_send_email') == 1 ? 'checked="checked"' : '' !!}>　許可のみ<br></td>
                </div>
              </td>
            </tr>

            <tr>
              <td>キーワード</td>
              <td style="width:20%">
                <div class="form-group">
                  <input type="text" name="s_keyword" class="form-control" value="{{ old('s_keyword')}}" placeholder="キーワードを入力" /></td>
                </div>
              </td>
            </tr>
        </table>

        <div class="form-group" align="center">
          <br/>
          <a href="{{route('answers.index')}}" onclick="dummy(0);return false;" class="btn btn-default">リセット</a>
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
            <td style="width:50%" align="left">
              <br>
              <button style="margin-bottom: 10px" class="btn btn-danger delete_all" data-url="{{ url('answersDeleteAll') }}">選択したアンケートを削除</button>
            </td>
            <td align="right"><br>{{ '全&nbsp;'. $answers -> total() .'&nbsp;件中&nbsp;&nbsp;&nbsp;' . $answers -> firstItem() . ' ~ ' . $answers -> lastItem() . ' 件&nbsp;&nbsp; ' }}</td>
            <td align="right">{{ $answers -> render() }}</td>
          </tr>
      </table>
    </div>

        <table class="table table-hover">
          <thead >
            <tr>
              <th scope="col"><input type="checkbox" id="all" />&nbsp;&nbsp;全選択</th>
              <th scope="col">ID</th>
              <th scope="col">氏名</th>
              <th scope="col">性別</th>
              <th scope="col">年代</th>
              <th scope="col">内容</th>
              <th scope="col"></th>
            </tr>
          </thead>
            <!-- アンケート一覧 -->
            @foreach($answers as $row)
          <tbody>
            <tr id="tr_{{$row['id']}}">
              <th><input type="checkbox" class="sub_chk" data-id="{{$row['id']}}"/>&nbsp;&nbsp;選択</th>
              <th scope="row"><span class="badge">{{$row['id']}}</span></th>
              <td>{{$row['fullname']}}</td>
              <td>
                  @if($row['gender'] == 1)
                    男性
                  @else
                    女性
                  @endif
              </td>
              <td>{{$row['age']}}</td>
              <td>{{ strip_tags(str_limit($row['feedback'], 30, '...', '<br>')) }}</td>
              <td>
                <a href="{{action('AnswersController@show', $row['id'])}}" ><button type="submit" class="btn btn-primary">編集</button></a>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
        @if($answers->count())
        @else
              <div class="alert alert-warning">
                <p align="center">該当するアンケートはありません</p>
              </div>
        @endif
        <br><br>
    </div>
  </div>
</div>

@endsection
