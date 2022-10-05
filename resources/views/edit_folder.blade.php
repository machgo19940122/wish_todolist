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
      <form action="{{ route('delete_folder', ['folder_id' => $folders->id])}}" method="POST">
                                         @csrf 
                                         {{ method_field('DELETE') }}
                                         <button type="submit" class="btn btn-light float-right" onClick="delete_alert(event);return false;">
                                         <i class="fa-solid fa-trash"></i>
                                         </button>
                                         
             </form>

        <div>
          <form action="{{ route('edit_folder', ['folder_id' => $folders->id])}}" method="POST">
                @csrf
                <div class="mb-3">
                  <input type="text" class="form-control mt-5" name="title" id="title" value="{{ $folders->title }}" />
                </div>
                
                <input  name ="folder_id"value="{{$folders->id}}" hidden>
                <button type="submit" class="btn btn btn-light  float-right">更新</button>
           </form>

        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('/js/expense.js') }}"></script>
@endsection