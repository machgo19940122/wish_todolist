@extends('common/header_side')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div>
                <div><h1>login</h1></div>

                    @if(isset($login_error))
                    <div class="alert alert-warning text-sm" role="alert">
                            ログインに失敗しました。社員番号、パスワードが正しいかご確認ください。
                    </div>
                    @endif

                <div>
                    <form method="POST" action="" >
                        <div>
                            <label class="col-md-4 col-form-label text-md-end">email</label>
                            <div class="col-md-6">
                                <input id="email" name="email" type="email" name="email" class="form-control" maxlength="50" required autofocus>
                            </div>
                        </div>

                        <div>
                            <label for="input_color" class="col-md-4 col-form-label text-md-end">Password</label>
                            <div class="col-md-6">
                                <input id="textPassword"  value="" type="password" class="form-control" name="password" maxlength="128" required >
                                <span id="buttonEye" class="fa fa-eye"></span>

                            </div>
                        </div>
                        <div>
                            <div class="col-md-8">
                                <button type="submit" class="btn  btn-light" action="{{ route('signin') }}">Login
                                </button>
                            </div>
                            {{ csrf_field() }}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/js/main.js') }}"></script>
<script src="{{ asset('/js/password.js') }}"></script>
@endsection