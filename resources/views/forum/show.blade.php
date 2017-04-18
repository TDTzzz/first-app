@extends('app')
@section('content')
  @include('shared.msg')
  <div class="jumbotron">
    <div class="container">
      <div class="media">
        <div class="media-left">
          <a href="#">
            <img class="media-object img-circle" src="{{$discussion->user->avatar}}" alt="64x64" width="64px">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">{{$discussion->title}}
            @if(Auth::check() && Auth::user()->id==$discussion->user_id)
            <a href="/discussions/{{$discussion->id}}/edit" class="btn btn-primary btn-lg pull-right">修改帖子</a>
            @endif
          </h4>
          {{$discussion->user->name}}
        </div>
  </div>
  </div>
</div>
  <div class="container">
    <div class="row">
      <div class="col-md-9" role="main">
        <div class="blog-post">
          <h3>{!!$html!!}</h3>
        </div>
        <hr>
        @foreach($discussion->comments as $comment)
        <div class="media">
          <div class="media-left">
            <a href="#">
              <img src="{{$comment->user->avatar}}" class="media-object img-circle" style="width:64px;" alt="64x64">
            </a>
          </div>
          <div class="media-body">
            <h4 class="media-heading">{{$comment->user->name}}</h4>
            {{$comment->body}}
          </div>
        </div>
        @endforeach
        <hr>
        @if(Auth::check())
        <form action="/comment" method="post">
          {{csrf_field()}}
          <div class="form-group">
            <input type="hidden" name="discussion_id" value="{{$discussion->id}}">
          </div>
          <textarea name="body" rows="12" cols="80" class="form-control">{{old('body')}}</textarea>
          <button type="submit" name="button" class="btn btn-success form-control">发表评论</button>
        </form>
        @else
          <a href="{{route('login')}}" class="btn btn-success form-control">登陆后可评论</a>
        @endif
      </div>
    </div>
  </div>

@stop
