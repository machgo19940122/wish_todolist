@extends('common/header_side')

@section('content')
<div class="wrap">
      <a href="/wishlist" class="button link">check Wish list</a>
      <a href="/todolist" class="button2 link">check To do</a>
  </div>


<script src="{{ asset('/js/main.js') }}"></script>
<script src="{{ asset('/js/password.js') }}"></script>
@endsection