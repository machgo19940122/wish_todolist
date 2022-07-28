@extends('common/header_side')

@section('content')

<div class="container">
    <div>
        <div>
            <div>
                <div><h1>会員登録情報修正</h1></div>

                <div>
                    <form method="POST" action="" >
                      <div>
                            <label for="text" class="col-md-4">ID</label>
                            <div class="col-md-6">
                                <input id="id" type="text" name="name" class="form-control" maxlength="100" disabled>
                            </div>
                        </div>

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


  @endsection