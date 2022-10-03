<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>wish and todo </title>
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/css/style.css')}}">
  <!-- fontawsome -->
  <script src="https://kit.fontawesome.com/0ee9da3264.js" crossorigin="anonymous"></script>
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
        <span class="my-navbar-item">user:{{session('id')}}/name:{{session('name')}}</span>
        @endif
      </div>
    </nav>
  </header>

  <main>  
    <div class="side w-10" id="side_bar">  
        <ul class="nav nav-stacked side_1">
                <li><a href="/wish/0/folders/0/tasks" >wishlist</a></li>
                <li ><a href="/todo/0/folders/0/tasks">todolist</a></li>
                <li><a href="/edit_member/{{session('id')}}">会員情報変更</a></li>
                <li><a href="/add_friend/{{session('id')}}">お友達設定</a></li>
                <li><a href="/logout"><form  action="{{ route('logout') }}" method="GET">ログアウト</form></a></li>
        </ul>

        <ul class="nav nav-stacked side_2">
                <li><a href="/wish/0/folders/0/tasks" ><i class="fa-solid fa-w"></i></a></li>
                <li ><a href="/todo/0/folders/0/tasks"><i class="fa-solid fa-t"></i></a></li>
                <li><a href="/edit_member/{{session('id')}}"><i class="fa-solid fa-user"></i></a></li>
                <li><a href="/add_friend/{{session('id')}}"><i class="fa-solid fa-user-group"></i></a></li>
                <li><a href="/logout"><form  action="{{ route('logout') }}" method="GET"><i class="fa-solid fa-right-from-bracket"></i></form></a></li>
        </ul>
    </div>

    <div class="w-90 side_margin">
      @yield('content')
    </div>
  </main>
    
</body>

</html>