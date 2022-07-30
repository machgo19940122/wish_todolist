@extends('common/header_side')

@section('content')
<!-- バリデーションエラーメッセージ-->
@if ($errors->any())
  <div class="alert alert-info">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div>
        <div>
            <div>
                <div><h1>会員登録情報修正</h1></div>

                <div>
                    <form method="POST" action="{{route('edit_member',$user->id)}}" >
                      <div>
                            <label for="text" class="col-md-4">ID</label>
                            <div class="col-md-6">
                                <input id="id" type="text" name="user_id" class="form-control" maxlength="100" value="{{$user->id}}"disabled>
                            </div>
                        </div>

                         <div>
                            <label for="text" class="col-md-4">名前</label>
                            <div class="col-md-6">
                                <input id="name" type="text" name="user_name" class="form-control" value="{{$user->name}}"maxlength="15">
                            </div>
                        </div>
                      
                        <div>
                            <label for="text" class="col-md-4">email</label>
                            <div class="col-md-6">
                                <input type="email" name="user_email" maxlength="50" class="form-control" value="{{$user->email}}">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="col-md-4">Password</label>
                            <div class="col-md-6">
                                <input id="textPassword" type="text" class="form-control" name="user_password" maxlength="128" placeholder="パスワードを変更する場合のみ入力して下さい">
                                <span id="buttonEye" class="fa fa-eye"></span>
                            </div>
                        </div>


                        <div>
                            <div class="col-md-4">
                                <button type="submit" class="btn  btn-light">
                                    更新
                                </button>
                                {{ csrf_field() }}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- フラッシュメッセージ -->
 <script>
  @if (session('flash_message3'))
     $(function () {
                    toastr.success('{{ session('flash_message3') }}');});
  @endif
</script>
<script src="{{ asset('/js/password.js') }}"></script>
  @endsection