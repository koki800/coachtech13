<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @if(app('env') == 'production')
    <link href="{{ secure_asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/inquiry.css') }}" rel="stylesheet">
  @else
      <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
      <link href="{{ asset('css/inquiry.css') }}" rel="stylesheet">
  @endif
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <title>お問い合わせ</title>
</head>
<body>
  <div>
    <h1>お問い合わせ</h1>
  </div>
  <div class=input_form>
    <form action="/confirm" method="post">
    @csrf
      <table>
        <tr>
          <input type="hidden" name="id">
          <th>お名前 <span>※</span></th>
          <td>
            <div class="input_name">
              <div>
                <input type="text" name="fullname1" id="" class="name">
                <p>例）山田</p>
              </div>
              <div>
                <input type="text" name="fullname2" id="" class="name">
                <p>例）太郎</p>
              </div>
              <input type="hidden" name="fullname" class="name" value="">
              <script>
                let n0 = document.getElementsByClassName('name')[0].value;
                console.log(n0);
                let n1 = document.getElementsByClassName('name')[1].value;
                function name(){
                  let n2 = n0 + n1;
                  return n2;
                };
                const nz = name();
                console.log(nz);
                document.getElementsByClassName('name')[2].value.innerHTML = nz;
              </script>
            </div>
            @error('fullname')
              <p class="error">{{$message}}</p>
            @enderror
          </td>
        </tr>
        <tr class="gender">
          <th>性別 <span>※</span></th>
          <td class="radio">
            <ul>
              <li>
                <input type="radio" name="gender" id="man" value="1" checked="checked"><label for="man">男性</label>
              </li>
              <li>
                <input type="radio" name="gender" id="woman" value="2"><label for="woman">女性</label>
              </li>
            </ul>
          </td>
        </tr>
        <tr>
          <th>メールアドレス  <span>※</span></th>
          <td>
            <input type="email" name="email" id="">
            @error('email')
              <p class="error">
                {{$message}}
              </p>
            @enderror
            <p>例）test@example.com</p>
          </td>
        </tr>
        <tr>
          <th>郵便番号 <span>※</span></th>
          <td>
            <span>〒</span>
            <input type="text" name="postcode" id=""　class="postcode" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" oninput="value = value.replace(/[０-９]/g,s => String.fromCharCode(s.charCodeAt(0) - 65248)).replace(/[ー−]/g,'-').replace(/[^\-\d]/g,'');">
            @error('postcode')
              <p class="error">
                {{$message}}
              </p>
            @enderror
            <p>例）123-4567</p>
          </td>
        </tr>
        <tr>
          <th>住所 <span>※</span></th>
          <td>
            <input type="text" name="address" id="">
            @error('address')
              <p class="error">
                {{$message}}
              </p>
            @enderror
            <p>例）東京都渋谷区千駄ヶ谷1-2-3</p>
          </td>
        </tr>
        <tr>
          <th>建物名</th>
          <td><input type="text" name="building_name" id="">
          <p>例）千駄ヶ谷マンション101</p>
          </td>
        </tr>
        <tr>
          <th>
            <div>
              <p class="opinion">
                ご意見 <span>※</span>
              </p>
            </div>
          </th>
          <td>
            <textarea name="opinion" id="" cols="30" rows="5" maxlength="120"></textarea>
            @error('opinion')
              <p class="error">
                {{$message}}
              </p>
            @enderror
          </td>
        </tr>
      </table>
      <div>
        <button type="submit">確認</button>
      </div>
    </form>
  </div>
</body>
</html>