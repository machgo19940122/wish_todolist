@extends('common/header_side')

@section('content')

<div class="container">
  @if($category == '0')
    <h1>wishlist</h1>
  @else
    <h1>todo list</h1>
  @endif
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">フォルダを追加する</div>
          <div class="panel-body">
      
            <form action="{{ route('add_folder')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="title">フォルダ名</label>

                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
              </div>
                  <input name="category" id="title" value="{{$category}}" hidden> 
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