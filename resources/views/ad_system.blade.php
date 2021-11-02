<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @if(app('env') == 'production')
    <link href="{{ secure_asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/ad_system.css') }}" rel="stylesheet">
  @else
      <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
      <link href="{{ asset('css/ad_system.css') }}" rel="stylesheet">
  @endif
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理システム</title>
</head>
<body>
  <div class="title">
    <h1>管理システム</h1>
  </div>
  <form action="/search" method="post">
  @csrf
  <div class="search_form">
    <table>
      <tr>
        <th>お名前</th>
        <td><input type="text" name="fullname" id=""></td>
        <th>性別</th>
        <td>
          <input type="radio" name="gender" id="" value="1,2" checked="checked">全て
          <input type="radio" name="gender" id="" value="1">男性
          <input type="radio" name="gender" id="" value="2">女性
        </td>
      </tr>
      <tr>
        <th>登録日</th>
        <td>
          <input type="date" name="updated_at" id="">
          <span>〜</span>
          <input type="date" name="updated_at" id="">
        </td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td><input type="email" name="email" id=""></td>
      </tr>
    </table>
    <div>
      <button class="search">検索</button>
      <button type="reset" class="reset">リセット</button>
    </div>
  </div>
  </form>
  <div class="page">
    <div>
      <p>全{{ $items->total() }}件中{{ $items->firstItem() }}〜{{ $items->lastItem() }}件</p>
    </div>
    <div>
      {{ $items->links() }}
    </div>
  </div>
  @if(count($items) > 0)
  <div class="data_table">
    <table class="data">
      <tr class="header">
        <th>ID</th>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>ご意見</th>
        <th></th>
      </tr>
      @foreach($items as $item)
      <form action="/delete" method="post">
      @csrf
      <tr>
        <input type="hidden" name="id" value="{{$item -> id}}">
        <td>{{$item -> id}}</td>
        <td>{{$item -> fullname}}</td>
        <td>
          @if({{$items -> gender}} == 1)
            {{"男性"}}
          @else
            {{"女性"}}
          @endif
        </td>
        <td>{{$item -> email}}</td>
        <td class="opinion" onmouseover="$(this).attr('title',$(this).text())">
          {{$item -> opinion}}
        </td>
        <td>
          <button class="delete">削除</button>
        </td>
      </tr>
      </form>
      @endforeach
    </table>
  </div>
  @endif
</body>
</html>