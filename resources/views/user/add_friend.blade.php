@extends('common/header_side')

@section('content')
<div class="container">
<h1>to do list</h1>
    <div class="row">
      <div class="column col-md-8">

        <form action="{{url('/search_friend')}}" method="POST">
                    <div class="form-inline">
                      <input type="search" name="friend_id" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" >
                      <button type="submit" class="btn btn-outline-primary">search</button>
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
                <td>{{$friends->follow_user_id}}</td>
                <td>{{$friend_name}}</td>
                <td><a href="/todolist_edit_task">追加</a></td>
              </tr>
            
            </tbody>
          </table>
      </div>
    </div>
  </div>
@endsection