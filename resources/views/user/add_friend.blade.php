@extends('common/header_side')

@section('content')
<!-- バリデーションエラーメッセージ-->
@if ($errors->any())
  <div class="alert alert-light">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-fluid">

  <h1>who is your partner?</h1>
<div class="row">
        <div class="">
            <h6>※１アカウントに対して１人、共有するパートナーを設定できます。</h6>
        </div>

          @if(!empty($no_friend_parameter))
         <form action="{{route('search_friend')}}" method="GET">
                    <div class="w-50">
                          <input type="search" name="keyword" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" >
                          <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
         </form>   
        

           <div class="my-5">※まだ登録されていません。</div>


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