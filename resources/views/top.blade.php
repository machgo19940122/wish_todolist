@extends('common/header_side')

@section('content')
<div class="wrap">
      <a href="/wish/0/folders/0/tasks" class="button link">check Wish list</a>
      <a href="todo/1/folders/0/tasks" class="button2 link">check To do</a>
  </div>


<script src="{{ asset('/js/main.js') }}"></script>
<script src="{{ asset('/js/password.js') }}"></script>
@endsection