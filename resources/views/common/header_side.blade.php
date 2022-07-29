<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>経費管理APP</title>
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/css/style.css')}}">
  <!-- フラッシュメッセージCSS -->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>

<body>
  <header>
    <nav class="my-navbar">
      <a class="my-navbar-brand header_topics" href="/top">Wish and Todo List</a>
      <div class="my-navbar-control">
        @if(!Session::has('id'))
        <a class="my-navbar-item" href="/login">ログイン</a>
        <a class="my-navbar-item" href="/register">会員登録</a>
        @else
        <span class="my-navbar-item header_topics">user:{{session('id')}}/name:{{session('name')}}</span>
        @endif
      </div>
    </nav>
  </header>

  <main>  
    <div class="side" id="side_bar">  
        <ul class="nav nav-stacked">
                <li><a href="/wishlist" >wishlist</a></li>
                <li ><a href="/todolist">todolist</a></li>
                <li><a href="/edit_member/{{session('id')}}">会員情報変更</a></li>
                <li><a href="/add_friend">お友達設定</a></li>
                <li><a href="/logout"><form  action="{{ route('logout') }}" method="GET">ログアウト</form></a></li>
        </ul>
    </div>

    <div class="main_content">
      @yield('content')
    </div>
  </main>
    
</body>

</html>