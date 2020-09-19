@extends('layouts.index')

@section('title', 'TOP')

@section('content')
        <div class="top-wrapper">
          <div class="container">
            <h1>なんかテキスト</h1>
            <p>テキストテキストテキストテキストテキストテキストテキストテキスト<br>
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            <div class="btn-wrapper">
              <a href="{{ route('register') }}" class="btn signup">さっそく始めてみる</a>
            </div>
          </div>
        </div>
        <div class="post-wrapper">
          <div class="heading_text">
            最新投稿一覧
          </div>
          <div class="container">
            <div class="row">
              <div class="col-sm-3">
                <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/post/{{ $post_image_path[0] }}">
              </div>
              <div class="col-sm-3">
                <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/post/{{ $post_image_path[1] }}">
              </div>
              <div class="col-sm-3">
                <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/post/{{ $post_image_path[2] }}">
              </div>
              <div class="col-sm-3">
                <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/post/{{ $post_image_path[3] }}">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/post/{{ $post_image_path[4] }}">
              </div>
              <div class="col-sm-3">
                <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/post/{{ $post_image_path[5] }}">
              </div>
              <div class="col-sm-3">
                <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/post/{{ $post_image_path[6] }}">
              </div>
              <div class="col-sm-3">
                <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/post/{{ $post_image_path[7] }}">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/post/{{ $post_image_path[8] }}">
              </div>
              <div class="col-sm-3">
                <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/post/{{ $post_image_path[9] }}">
              </div>
              <div class="col-sm-3">
                <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/post/{{ $post_image_path[10] }}">
              </div>
              <div class="col-sm-3">
                <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/post/{{ $post_image_path[11] }}">
              </div>
            </div>
          </div>
        </div>
          </div>
        </div>
@endsection