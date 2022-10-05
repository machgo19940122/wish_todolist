@extends('common/header_side')

@section('content')


<h1>wish list</h1>
<div class="mw-50">

    <div>
     <button class="btn">
          <a href="{{ route('wish_edit', ['task_id' => $tasks->id]) }}">edit</a>
      </button>
    </div>

    
      <div class="col-md-6">
                    <div class="form-group">
                      <label for="title">タイトル</label>
                      <input type="text" class="form-control" name="title" id="title" value="{{ $tasks->title }}" readonly/>
                    </div>

                    <div class="form-group">
                      <label for="due_date">期限</label>
                      <input type="date" class="form-control" name="due_date" id="due_date" value="{{ $tasks->due_date }}" readonly/>
                    </div>

                    <div class="form-group">
                      <label for="url">URL</label>
                      @if(isset($tasks->url))
                          <p><a href="{{$tasks->url}}" target="_blank">URLを開く</a></p>
                          @else
                          <p>URLなし</p>
                          @endif
                    </div>

                    <div class="form-group">
                      <label for=""budget>予算</label>
                      <input type="text" class="form-control" name="budget" id="budget" value="{{ $tasks->budget }}" readonly/>
                    </div>

                    <div class="form-group">
                      <label for="comment">コメント</label>
                      <input type="text" class="form-control" name="comment" id="comment" value="{{ $tasks->comment}}" placeholder="登録時のメモにご利用ください"readonly>
                    </div>


                    <div class="form-group">
                      <label for="status">remarks</label>
                      <input type="text" class="form-control" name="remarks" id="remarks" value="{{$tasks->remarks }}" placeholder="完了時のコメントにご利用ください" readonly>
                    </div>

                    <div class="form-group">
                          <label for="status">ステータス</label>
                          <select name="status" id="status" class="form-control" readonly>
                          <option value="0"  <?php if($tasks->status == "0"): ?>selected<?php endif ?>>未着手</option>
                          <option value="1"  <?php if($tasks->status == "1"): ?>selected<?php endif ?>>着手中</option>
                          <option value="2"  <?php if($tasks->status == "2"): ?>selected<?php endif ?>>完了</option>
                       </div>  
        </div>
      </div>
    </div>

 


  <script src="{{ asset('/js/expense.js') }}"></script>

@endsection