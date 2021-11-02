<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @if(app('env') == 'production')
    <link href="{{ secure_asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/register.css') }}" rel="stylesheet">
  @else
      <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
      <link href="{{ asset('css/register.css') }}" rel="stylesheet">
  @endif
  <title>登録完了</title>
</head>
<body>
  <div>
    <p>
      ご意見いただきありがとうございました。
    </p>
    <button>トップページへ</button>
  </div>
</body>
</html>