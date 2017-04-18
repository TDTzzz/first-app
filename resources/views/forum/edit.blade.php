@extends('app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        @include('shared.errors')
        <form action="/discussions/{{$discussion->id}}" method="post">
          {{method_field('PATCH')}}
          {{csrf_field()}}
          <div class="form-group">
            <label for="title">标题:</label>
            <input type="title" name="title" class="form-control" value="{{$discussion->title}}">
          </div>
          <div class="form-group">
            <label for="body">内容:</label>
            <textarea name="body" rows="12"  class="form-control" value="">{{$discussion->body}}</textarea>
          </div>
          <button class="btn btn-success form-control" type="submit" name="button">修改</button>
        </form>
      </div>
    </div>
  </div>
@stop
