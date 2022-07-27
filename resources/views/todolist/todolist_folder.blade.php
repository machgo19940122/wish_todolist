@extends('common/header_side')

@section('content')
<div class="container">
<h1>todolist</h1>
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">フォルダを追加する</div>
          <div class="panel-body">
          
        
            <form action="" method="post">
              @csrf
              <div class="form-group">
                <label for="title">フォルダ名</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-light">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection