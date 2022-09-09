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

<div class="container side_margin_adjust">
                <div><h1>get your id to start !</h1></div>
                
                        <form method="POST" action="{{ route('postsignup') }}" class="form-group" >

                        <div class="mb-5">
                            <label for="text" class="">名前</label>
                            <input id="name" type="text" name="name" class="form-control" maxlength="15">
                        </div>
                      
                        <div class="mb-5">
                            <label for="text" class="">email</label>
                                <input type="email" name="email" maxlength="50" class="form-control">
                        </div>

                        <div class="mb-5">
                            <label for="password" class="">Password</label>
                            <input id="textPassword" type="password" class="form-control" name="password" maxlength="128">
                                <span id="buttonEye" class="fa fa-eye"></span>
                        </div>

                        <div class="mb-5">
                                <button type="submit" class="btn  btn-light">
                                    Register
                                </button>
                                {{ csrf_field() }}
                        </div>
                    </form>
</div>
<script src="{{ asset('/js/main.js') }}"></script>
<script src="{{ asset('/js/password.js') }}"></script>
@endsection