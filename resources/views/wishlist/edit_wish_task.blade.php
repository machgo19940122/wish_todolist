@extends('common/header_side')

@section('content')
<h1>wish list</h1>
<div class="">
    <form action="{{ route('delete_wish_task', ['task_id' => $tasks->id])}}" method="POST">
                                   @csrf 
                                   {{ method_field('DELETE') }}
                                   <button type="submit" class="btn" onClick="delete_alert_task(event);return false;">
                                   <i class="fa-solid fa-trash"></i>
                                   </button>
      </form>


   
      <div class="col-sm-6">
       
                <form action="" method="POST">
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
                      <label for=""budget>予算</label>
                      <input type="text" class="form-control" name="budget" id="budget" value="{{ $tasks->budget }}" />
                    </div>

                    <div class="form-group">
                      <label for="comment">コメント</label>
                      <input type="text" class="form-control" name="comment" id="comment" value="{{ $tasks->comment}}" placeholder="登録時のメモにご利用ください">
                    </div>


                    <div class="form-group">
                      <label for="status">remarks</label>
                      <input type="text" class="form-control" name="remarks" id="remarks" value="{{$tasks->remarks }}" placeholder="完了時のコメントにご利用ください">
                    </div>

                    <div class="form-group">
                          <label for="status">ステータス</label>
                          <select name="status" id="status" class="form-control">
                          <option value="0"  <?php if($tasks->status == "0"): ?>selected<?php endif ?>>未着手</option>
                          <option value="1"  <?php if($tasks->status == "1"): ?>selected<?php endif ?>>着手中</option>
                          <option value="2"  <?php if($tasks->status == "2"): ?>selected<?php endif ?>>完了</option>
                    </div>
                
                    <input  name ="folder_id"value="{{$tasks->folder_id}}" hidden>
                    <button type="submit" class="btn btn-light float-right">更新</button>
              </form> 
      </div>
  </div>
  <script src="{{ asset('/js/expense.js') }}"></script>
@endsection