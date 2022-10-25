@extends('common/header_side')

@section('content')

<div class="column col-md-8">
  <h1>LIST OF THE DAY {{$date}}</h1>
        <div class="panel panel-default">
          <div class="panel-heading">TODO</div>
                  <table class="table">
                    <thead>
                        <tr>
                          <th>やること</th>
                          <th>状況</th>
                        </tr>
                    </thead>

                    <tbody>
              @foreach($todos as $task)
                    <tr>
                      <td>{{ $task->title}}</td>
                    
                      <td>
                      <span class="label {{ $task->status_class }}">{{ $task->status_label }}</span>
                      <td><a href="{{ route('more_detail_todo', ['task_id' => $task->id]) }}" >詳細
                      </a></td> 
                    </tr>
              @endforeach

             
                    </tbody>
                  </table>
            </div>

            <div class="panel panel-default">
          <div class="panel-heading">WISH</div>
        
                  <table class="table">
                    <thead>
                        <tr>
                          <th>やること</th>
                          <th>状況</th>
                        
                        </tr>
                    </thead>

                    <tbody>

                  

                    @foreach($wishes as $wish)
                    <tr>
                      <td>{{ $wish->title}}</td>
                     
                      <td>
                      <span class="label {{ $wish->status_class }}">{{ $wish->status_label }}</span>
                      <td><a href="{{ route('more_detail_wish', ['task_id' => $wish->id]) }}" >詳細</a></td>
                    </tr>
              @endforeach
                    </tbody>
                  </table>
            </div>
    

    

</div>

@endsection