@extends('common/header_side')

@section('content')


  <div class="container-fluid">
    <h1>edit your folder name </h1>
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">フォルダー名を編集する</div>
          <div class="panel-body">

      <div class="row">
        <form action="{{ route('edit_folder', ['folder_id' => $folders->id])}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $folders->title }}" />
              </div>
              
              <input  name ="folder_id"value="{{$folders->id}}" hidden>
              <button type="submit" class="btn btn-light">更新</button>
         </form>
        
        
          <form action="{{ route('delete_folder', ['folder_id' => $folders->id])}}" method="POST">
                                       @csrf 
                                       {{ method_field('DELETE') }}
                                       <button type="submit" class="btn btn-light" onClick="delete_alert(event);return false;">フォルダーを消す</button>
                                       
           </form>
        

        
      </div>
    </div>
  </div>

  <script src="{{ asset('/js/expense.js') }}"></script>
@endsection