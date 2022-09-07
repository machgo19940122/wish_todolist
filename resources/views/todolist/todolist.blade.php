@extends('common/header_side')

@section('content')
<div class="container">
<h1>to do list</h1>
    <div class="row">
      <div class="col col-md-4">
        <nav class="panel panel-default">
          <div class="panel-heading">フォルダ</div>
            <div class="panel-body">
                <a href="/add_folder/1" class="btn btn-default btn-block">
                  フォルダを追加する
                </a>
             </div>
          
                @foreach($folders as $folder)
                <a href="{{ route('todo_tasks.index', ['id' => $folder->id,'category'=>'1']) }}" 
                      class="list-group-item">
                    {{ $folder->title }}</a>
                  <a href="{{ route('get_edit_folder', ['folder_id' => $folder->id]) }}" >編集</a>
                  @endforeach
           
        </nav>
      </div>
      <div class="column col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">タスク</div>
          <div class="panel-body">
            <div class="text-right">
              <a href="{{ route('get_add_tdtask', ['folder_id' => $current_folder_id]) }}" class="btn btn-default btn-block">
                タスクを追加する
              </a>
            </div>
          </div>

          <table class="table">
            <thead>
            <tr>
              <th>やること</th>
              <th>期限</th>
              <th>状況</th>
              <th>URL</th>
              <th>担当</th>
              <th>コメント</th>
              <th>備考</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
              <tr>
                <td>{{ $task->title}}</td>
                <td>{{ $task->due_date}}</td>
                <td>
                <span class="label {{ $task->status_class }}">{{ $task->status_label }}</span>
                 </td>
                 @if(isset($task->url))
                <td><a href="{{$task->url}}" target="_blank">URLあり</a></td>
                @else
                <td>URLなし</td>
                @endif
                <td>{{ $task->who}}</td>
                <td>{{ $task->comment}}</td>
                <td>{{ $task->remarks}}</td>
                <td><a href="{{ route('td_edit', ['task_id' => $task->id]) }}" >編集</a></td>
              </tr>
            @endforeach
       
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- フラッシュメッセージ -->
 <script>
  @if (session('flash_message_6'))
     $(function () {
                    toastr.warning('{{ session('flash_message_6') }}');});
  @endif
  </script>
@endsection