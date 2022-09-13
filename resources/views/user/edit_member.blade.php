@extends('common/header_side')

@section('content')
<!-- バリデーションエラーメッセージ-->
@if ($errors->any())
  <div class="alert alert-light">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container-fluid">
                    <div><h1>edit your infomation </h1></div>
                     <form method="POST" action="{{route('edit_member',$user->id)}}" >
                   
                            <div class="mb-3"> 
                            <label for="text" class="col-md-4">ID</label>
                                <input id="id" type="text" name="user_id" class="form-control" maxlength="100" value="{{$user->id}}"disabled>
                            </div>
                     
                            <div class="mb-3">
                            <label for="text" class="col-md-4">名前</label>
                                <input id="name" type="text" name="user_name" class="form-control" value="{{$user->name}}"maxlength="15">
                            </div>
                        
                            <div class="mb-3">
                            <label for="text" class="col-md-4">email</label>
                                <input type="email" name="user_email" maxlength="50" class="form-control" value="{{$user->email}}">
                            </div>
                        
                            <div class="mb-3">
                            <label for="password" class="col-md-4">Password</label>
                                <input id="textPassword" type="text" class="form-control" name="user_password" maxlength="128" placeholder="パスワードを変更する場合のみ入力して下さい">
                                <span id="buttonEye" class="fa fa-eye"></span>
                            </div>
                        
                            <div class="mb-3 float-right">
                                <button type="submit" class="btn  btn-light">
                                    更新
                                </button>
                                {{ csrf_field() }}
                            </div>
                    </form>
</div>
 <!-- フラッシュメッセージ -->
 <script>
  @if (session('flash_message_3'))
     $(function () {
                    toastr.success('{{ session('flash_message_3') }}');});
  @endif
</script>
<script src="{{ asset('/js/password.js') }}"></script>
  @endsection