@extends('common/header_side')

@section('content')
<div class="side_margin_adjust">
                <div>
                    <h1>login</h1></div>
                    @if(isset($login_error))
                    <div class="alert alert-warning text-sm" role="alert">
                            ログインに失敗しました。emailとパスワードが正しいかご確認ください。
                    </div>
                    @endif
                <div>

             <form method="POST" action="{{route('signin')}}" class="form-group">
                        <div class="mb-3">
                            <label class="form-label">email</label>
                            <input id="email" name="email" type="email" name="email" class="form-control" maxlength="50" required autofocus>
                            
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                           <input id="textPassword"  value="" type="password" class="form-control" name="password" maxlength="128" required >
                            <span id="buttonEye" class="fa fa-eye"></span>
                        </div>

                        <div>
                            <div class="mt-3">
                                <button type="submit" class="btn  btn-light" action="{{ route('signin') }}">Login
                                </button>
                            </div>
                            {{ csrf_field() }}
                        </div>
                </form>
</div>

<script src="{{ asset('/js/main.js') }}"></script>
<script src="{{ asset('/js/password.js') }}"></script>
<!-- フラッシュメッセージ -->
 <script>
            @if (session('flash_message_5'))
                $(function () {
                               toastr.success('{{ session('flash_message_5') }}'); });
           @endif
</script>
@endsection