@extends('layouts.index')

@section('content')
<div class="container">
    <h1>新規投稿</h1>
    <div class="row" style="width: 100%;">
        <div class="col-md-8 mx-auto" >
            <form action="{{ action('Admin\PostController@create') }}" method="method">
            <!-- タイトル -->
            <div class="form-group">
                <label class="control-label">タイトル</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
