@extends('common/header_side')

@section('content')
  <div class="container">
    <h1>todo list</h1>
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">"{{$tasks->title}}"を編集する</div>
          <div class="panel-body">
            <form action="" method="POST">
              </div>  
                <div class="text-right">
                  <button type="submit" class="btn btn-light">更新</button>
                </div>
              @csrf
              <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $tasks->title }}" />
              </div>

              <div class="form-group">
                <label for="due_date">期限</label>
                <input type="date" class="form-control" name="due_date" id="due_date" value="{{ $tasks->due_date }}" />
              </div>

              <div class="form-group">
                <label for="url">URL添付</label>
                <input type="text" class="form-control" name="url" id="due_date" value="{{ $tasks->url}}" />
              </div>

              <div class="form-group">
                <label for=”who">担当</label>
                <input type="text" class="form-control" name="who" id="who" value="{{ $tasks->who }}" />
              </div>

              <div class="form-group">
                <label for="comment">コメント</label>
                <input type="text" class="form-control" name="comment" id="comment" value="{{ $tasks->comment}}" placeholder="登録時のメモにご利用ください”>
              </div>


              <div class="form-group">
                <label for="status">remarks</label>
                <input type="text" class="form-control" name="remarks" id="remarks" value="{{$tasks->remarks }}" placeholder="完了時のコメントにご利用ください">
              </div>

              <div class="form-group">
                    <label for="status">ステータス</label>
                    <select name="status" id="status" class="form-control">
                          <option value='0'>完了</option>
                          <option value='1'>実行中</option>
                          <option value='2'>完了</option>
              </div>
              <input  name ="folder_id"value="{{$tasks->folder_id}}" hidden>
         </form>
        </nav>
      </div>
    </div>
  </div>
@endsection