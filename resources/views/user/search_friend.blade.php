@extends('common/header_side')

@section('content')
<div class="container">
<h1>to do list</h1>
    <div class="row">
      <div class="column col-md-8">

        <form action="{{route('search_friend')}}" method="GET">
                    <div class="form-inline">
                      <input type="search" name="keyword"      
                      class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" 
                      >
                      <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
        </form>   

         <div class="panel panel-default">
          <table class="table">
            <thead>
            <tr>
              <th>ID</th>
              <th>name</th>
            </tr>
            </thead>
            <tbody>
              <tr>
              @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                          <form method="post" action="{{ route('add_friend', ['friend_id'=>$user->id]) }}">
                            <button type="submit" class="btn  btn-light">
                              追加
                            </button>
                            {{ csrf_field() }}
                          </td>
                    </tr>
                      @empty
                        <td>見つかりませんでした。</td>
                      @endforelse
                    </form>
              </tr>
            </tbody>
          </table>
         
      </div>
    </div>
  </div>

    <!-- フラッシュメッセージ -->
    <script>
            @if (session('flash_message_1'))
                $(function () {
                               toastr.warning('{{ session('flash_message_1') }}'); });
           @endif
       </script>
    <!-- フラッシュメッセージ -->
    <script>
            @if (session('flash_message_2'))
                $(function () {
                               toastr.warning('{{ session('flash_message_2') }}'); });
           @endif
       </script>
@endsection