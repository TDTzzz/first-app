@extends('app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        @include('shared.errors')
      <form action="/login" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="email">邮箱:</label>
          <input type="email" name="email" value="" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">密码:</label>
          <input type="password" name="password" class="form-control" value="">
        </div>
        <button class="btn btn-success form-control" type="submit" name="button">登陆</button>
      </form>
    </div>
    </div>
  </div>
@stop
