@extends('common/header_side')

@section('content')
<div class="container">
<h1>todolist</h1>
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">{{$folders->title}}にタスクを追加しましょう</div>
          <div class="panel-body">

            <form action="" method="POST">
              @csrf
              <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
              </div>

              <div class="form-group">
                <label for="due_date">期限</label>
                <input type="date" class="form-control" name="due_date" id="due_date" value="{{ old('due_date') }}" />
              </div>

              <div class="form-group">
                <label for="url">URL添付</label>
                <input type="text" class="form-control" name="url" id="due_date" value="{{ old('url') }}" />
              </div>

              <div class="form-group">
                <label for=”who">担当</label>
                <input type="text" class="form-control" name="who" id="who" value="{{ old('who') }}" />
              </div>

              <div class="form-group">
                <label for="who">コメント</label>
                <input type="text" class="form-control" name="comment" id="comment" value="{{ old('comment') }}" />
              </div>


              <div class="form-group">
                <label for="status">remarks</label>
                <input type="text" class="form-control" name="remarks" id="remarks" value="{{ old('remarks') }}" />
              </div>

              <!-- フォルダーIDをセット -->
              <input  name ="folder_id"value="{{$folder_id}}" hidden>
              <input  name ="status" value="0" hidden>
              
              


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