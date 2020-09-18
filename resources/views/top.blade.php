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
        <div class="post-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/post/{{ $post_image_path[0] }}"
              </div>
            </div>
          </div>
        </div>
          </div>
        </div>
@endsection