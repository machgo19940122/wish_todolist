@extends('common/header_side')

@section('content')

<div class="container-fluid width100">
     <h1>wish list</h1>
     <div>
     <?php if("0" == $current_folder_id): ?>
     ※フォルダーを選択してください
      <?php endif ?>
     </div>
   <div class="row">
      <div class="col col-md-4">
            <nav class="panel panel-default">
              <div class="panel-heading">フォルダ</div>
                    <div class="panel-body">
                      <a href="/add_folder/0" class="btn btn-default btn-block">
                        フォルダを追加する
                      </a>
                   
                        @foreach($folders as $folder)
                        <table class="table">
                          <tbody>
                            <tr>
                            <td>
                              <?php if($folder->id == $current_folder_id): ?>
                                <i class="fa-solid fa-check"></i><?php endif ?>

                              </td>
                              <td>
                              <td>
                                <a href="{{ route('wish_tasks.index', ['id' => $folder->id,'category'=>'0']) }}">
                                  {{ $folder->title }}</a>
                                </td>
                                
                                <td>
                                  <a href="{{ route('get_edit_folder', ['folder_id' => $folder->id]) }}" class="float-right">編集</a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          @endforeach
                    
                      </div>
            </nav>
      </div>

        <div class="column col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">タスク</div>
              <div class="panel-body">
                  <div class="text-right">
                      <a href="{{ route('get_add_wishtask', ['folder_id' => $current_folder_id]) }}" class="btn btn-default btn-block">タスクを追加</a>
                  </div>
              </div>

              <table class="table">
                      <thead>
                      <tr>
                        <th>やること</th>
                        <th>期限</th>
                        <th>状況</th>
                        <!-- <th>URL</th>
                        <th>コメント</th>
                        <th>予算</th>
                        <th>備考欄</th> -->
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($tasks as $task)
                        <tr>
                          <td>{{ $task->title}}</a></td>
                          <td>{{ $task->due_date}}</td>
                          <td>
                          <span class="label {{ $task->status_class }}">{{ $task->status_label }}</span>
                          </td>
                          <!-- @if(isset($task->url))
                          <td><a href="{{$task->url}}" target="_blank">URLあり</a></td>
                          @else
                          <td>URLなし</td>
                          @endif
                          <td>{{ $task->comment}}</td>
                          <td>{{ $task->budget}}</td>
                          <td>{{ $task->remarks}}</td> -->
                          
                          <td><a href="{{ route('more_detail_wish', ['task_id' => $task->id]) }}" >詳細</a></td>
                          <!-- <td><a href="{{ route('wish_edit', ['task_id' => $task->id]) }}" >shousai 
                          </a></td> -->
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
  @if (session('flash_message_7'))
     $(function () {
                    toastr.warning('{{ session('flash_message_7') }}');});
  @endif
  </script>
@endsection