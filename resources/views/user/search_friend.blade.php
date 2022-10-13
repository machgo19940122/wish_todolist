@extends('common/header_side')

@section('content')
<div class="w-50 center-block">

  <h1>who is your partner?</h1>
  <form action="{{route('search_friend')}}" method="GET" class="">

      <div class="row">
        <div class="">
          <input type="search" name="keyword"      
            class="form-control rounded " placeholder="Search" aria-label="Search" aria-describedby="search-addon" 
            >
        </div>

        <div class="float-right">

          <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-magnifying-glass "></i></button> 

        </div>
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
                            <button type="submit" class="btn  btn-light float-right">
                              追加
                            </button>
                            {{ csrf_field() }}
                          </form>
                        </td>
                </tr>
                <tr>
                      @empty
                        <td>見つかりませんでした。</td>
                      @endforelse
                </tr>
        </tbody>
      </table>

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
</div>
@endsection