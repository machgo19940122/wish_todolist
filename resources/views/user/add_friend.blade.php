@extends('common/header_side')

@section('content')
<div class="container width100">
<h1>who is your partner?</h1>

<div class="row">
  <div class="column col-md-8">
        <div class="box21">
            <p>タスクを共有できるパートナーを登録することができます。
            登録できるパートナーは、１アカウントに対して１人です。</p>
        </div>
          @if(!empty($no_friend_parameter))
      <form action="{{route('search_friend')}}" method="GET">
                    <div class="form-inline">
                      <input type="search" name="keyword" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" >
                      <button type="submit" class="btn btn-outline-primary">search</button>
                    </div>
        </form>   
        

         <div class="panel panel-default">
      
           <div>まだ登録されていません。</div>
           @else
          <table class="table">
            <thead>
            <tr>
              <th>ID</th>
              <th>name</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$friends->followed_user_id}}</td>
                <td>{{$friend_name}}</td>
                <td>
                <form method="post" action="{{ route('delete_friend', ['id'=>session('id')]) }}">
                <button type="submit" class="btn  btn-light">
                                    解除
                                </button>
                                {{ csrf_field() }}
                 </td>
                </form>
               
              </tr>
            </tbody>
          </table>
          @endif
      </div>
    </div>
  </div>

@endsection