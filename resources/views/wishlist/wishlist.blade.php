@extends('common/header_side')

@section('content')

<div class="container">
<h1>wish list</h1>
    <div class="row">
      <div class="col col-md-4">
        <nav class="panel panel-default">
          <div class="panel-heading">フォルダ</div>
          <div class="panel-body">
            <a href="/add_folder/0" class="btn btn-default btn-block">
              フォルダを追加する
            </a>
          </div>
          <div class="list-group">
              @foreach($folders as $folder)
                  <a href=""
                      class="list-group-item"
                  >
                    {{ $folder->title }}
                  </a>
                @endforeach
          </div>
        </nav>
      </div>
      <div class="column col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">タスク</div>
          <div class="panel-body">
            <div class="text-right">
              <a href="/wishlist_tasks" class="btn btn-default btn-block">
                タスクを追加する
              </a>
            </div>
          </div>
          <table class="table">
            <thead>
            <tr>
              <th>タイトル</th>
              <th>状態</th>
              <th>期限</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            
              <tr>
                <td>タイトル</td>
                <td>
                  <span class="label">状況</span>
                </td>
                <td>期日</td>
                <td><a href="/todolist_edit_task">
                      編集
                    </a></td>
              </tr>
            
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection