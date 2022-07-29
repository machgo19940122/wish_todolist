@extends('common/header_side')

@section('content')
<div class="container">
<h1>to do list</h1>
    <div class="row">
      <div class="column col-md-8">
        <div class="panel panel-default">
              <div class="form-inline">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" >
                <button type="button" class="btn btn-outline-primary">search</button>
              </div>
            
          <table class="table">
            <thead>
            <tr>
              <th>ID</th>
              <th>name</th>
            </tr>
            </thead>
            <tbody>
            
              <tr>
                <td>5</td>
                <td>yamada taro</td>
                <td><a href="/todolist_edit_task">追加</a></td>
              </tr>
            
            </tbody>
          </table>
      </div>
    </div>
  </div>
@endsection