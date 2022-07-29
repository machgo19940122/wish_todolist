@extends('common/header_side')

@section('content')
<div class="container">
    <div>
        <div>
            <div>
                <div><h1>get your id to start !</h1></div>

                <div>
                    <form method="POST" action="{{ route('postsignup') }}" >

                         <div>
                            <label for="text" class="col-md-4">名前</label>
                            <div class="col-md-6">
                                <input id="name" type="text" name="name" class="form-control" maxlength="15">
                            </div>
                        </div>
                      
                        <div>
                            <label for="text" class="col-md-4">email</label>
                            <div class="col-md-6">
                                <input type="email" name="email" maxlength="50" class="form-control">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="col-md-4">Password</label>
                            <div class="col-md-6">
                                <input id="textPassword" type="password" class="form-control" name="password" maxlength="128">
                                <span id="buttonEye" class="fa fa-eye"></span>
                            </div>
                        </div>

                        <div>
                            <div class="col-md-4">
                                <button type="submit" class="btn  btn-light">
                                    Register
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
<script src="{{ asset('/js/main.js') }}"></script>
<script src="{{ asset('/js/password.js') }}"></script>
@endsection