@extends('common/header_side')

@section('content')

<div class="container">
    <nav>
      <form>
          <div><h1>会員情報編集</h1></div>
            <form method="POST" action="">

            <label for="user_rule">ID</label>
             <input type="text" class="form-control" name="user_id" id="user_id" value="" disabled>

            
              <div class="form-group">
                <label for="user_name">名前</label>
                <input type="text" class="form-control" name="user_name" id="user_name" maxlength="100" value="">
              </div>

              <div class="form-group">
                <label for="user_name">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" maxlength="100" value="">
              </div>

              <div class="form-group">
                <label for="password" >パスワード</label>
                <input type="password" class="form-control" name="user_password" id="textPassword" maxlength="128" placeholder="パスワードを変更する場合のみ入力して下さい">
                <span id="buttonEye" class="fa fa-eye"></span>
              </div>
              @csrf 

              <div class="btn-toolbar">
                <div class="btn-group">
                            <button type="submit" class="btn btn-light">更新</button>
                </div>   
            
      </form>                  
    </nav>
 </div>


  @endsection