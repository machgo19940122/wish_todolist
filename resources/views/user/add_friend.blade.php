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



<div class="w-50 center-block">
  <h1>who is your partner?</h1>
  
  @if(!empty($no_friend_parameter))
        <div class="">
            <h6>※１アカウントに対して１人、共有するパートナーを設定できます。</h6>
        </div>

        
        <form action="{{route('search_friend')}}" method="GET" class="">
          <div class="">
            
            
            <div class="">
              <input type="search" name="keyword" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" >
            </div>
            
            <div class="float-right">
              <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            
          </div>
          
             <div class="my-5">
               ※まだ登録されていません。
             </div>
               
          </form>   
      </div>

           @else


       
        <div class="mt-5">

          <table class="table w-100">
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
                <button type="submit" class="btn  btn-light ">
                                    解除
                                </button>
                                {{ csrf_field() }}
                 </td>
                </form>
              </tr>
            </tbody>
          </table>


        </div>
    
          @endif
    


@endsection