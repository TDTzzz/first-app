@extends('app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        @include('shared.errors')
      <form action="/users/register" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="name">名称:</label>
          <input type="name" name="name" value="" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">邮箱:</label>
          <input type="email" name="email" value="" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">密码:</label>
          <input type="password" name="password" class="form-control" value="">
        </div>
        <div class="form-group">
          <label for="password_confirmation">确认密码:</label>
          <input class="form-control" type="password" name="password_confirmation" value="">
        </div>
        <button class="btn btn-success form-control" type="submit" name="button">注册</button>
      </form>
    </div>
    </div>
  </div>
@stop
