@extends('app')
@section('content')
  <div class="jumbotron">
    <div class="container">
      @include('shared.msg')
    <h1>欢迎来到Laravel社区..
      @if(Auth::check())

        <a href="/discussions/create" class="btn btn-primary btn-lg" style="margin-left:100px;">发布消息 >></a>
      @else
        <a href="{{route('login')}}" class="btn btn-success btn-lg">请先登陆</a>
      @endif
    </h1>
  </div>
</div>
  <div class="container">
    <div class="row">
      <div class="col-md-9" role="main">
        @foreach($discussions as $discussion)
          <div class="media">
            <div class="media-left">
              <a href="/discussions/{{$discussion->id}}">
                <img class="media-object img-circle" src="{{$discussion->user->avatar}}" alt="64x64" width="64px">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">
                <a href="/discussions/{{$discussion->id}}">{{$discussion->title}}</a>

              </h4>
              {{$discussion->user->name}}
            </div>
            <div class="media-right pull-right" style="display:block;">
              <span style="float:right">
                  {{count($discussion->comments)}}
                  回复</span>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>
  </div>
@stop
