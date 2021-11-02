<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @if(app('env') == 'production')
    <link href="{{ secure_asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/confirm.css') }}" rel="stylesheet">
  @else
      <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
      <link href="{{ asset('css/confirm.css') }}" rel="stylesheet">
  @endif
  <title>内容確認</title>
</head>
<body>
  <div>
    <h1>内容確認</h1>
  </div>
  <div class=input_form>
    <table>
    <tr>
      <th>お名前</th>
      <td>
        <p>{{$items -> fullname}}</p>
      </td>
    </tr>
    <tr>
      <th>性別</th>
      <td>
        @if($items -> gender == 1)
        <p>男性</p>
        @else
        <p>女性</p>
        @endif
      </td>
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td>
        <p>{{$items -> email}}</p>
      </td>
    </tr>
    <tr>
      <th>郵便番号</th>
      <td>
        <p>{{$items -> postcode}}</p>
      </td>
    </tr>
    <tr>
      <th>住所</th>
      <td>
        <p>{{$items -> address}}</p>
      </td>
    </tr>
    <tr>
      <th>建物名</th>
      <td>
        @isset($items -> building_name)
        <p>
        {{$items -> building_name}}
        </p>
        @else
        <p></p>
        @endisset
      </td>
    </tr>
    <tr>
      <th>
        <div>
          <p class="opinion">
            ご意見
          </p>
        </div>
      </th>
      <td>
        <p>{{$items -> opinion}}</p>
      </td>
    </tr>
    </table>
  </div>
  <div>
    <form action="/register" method="post">
      <button type="submit">送信</button>
    </form>
    <form action="/delete0" method="post">
      <button class="modify_button">
        <input type="hidden" name="id" value="{{$item -> id}}">
        <script>
          <a href="javascript:history.back()" class="modify">修正する</a>
        </script>
      </button>
    </form>
  </div>
</body>
</html>