@extends('layouts.index')

@section('title', '投稿編集')

@section('content')
<div class="container">
    <h1>新規投稿</h1>
    <div class="row" style="width: 100%;">
        <div class="col-md-6 mx-auto" >
            <form action="{{ action('Admin\PostController@update') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <!-- タイトル -->
                <div class="form-group">
                    <label class="control-label">タイトル</label>
                    <input type="text" class="form-control" name="title" value="{{ $post_form->title }}">
                </div>
                <!-- スポット -->
                <!--<div class="form-group">-->
                <!--    <label class="control-label">スポット</label>-->
                <!--    <input type="text" class="form-control" name="spot" value="{{ old('spot') }}">-->
                <!--</div>-->
                <!-- 使用金 -->
                <!--<div class="d-flex align-items-center">-->
                <!--    <div class="form-group">-->
                <!--        <label class="control-label">施設費</label>-->
                <!--        <input type="text" class="form-control" name="addmission-fee" value="{{ old('addmission-fee') }}">-->
                <!--    </div>-->
                <!--    <div class="form-group" style="margin-left: 100px;">-->
                <!--        <label class="control-label">購入金</label>-->
                <!--        <input type="text" class="form-control" name="purchase-cost" value="{{ old('purchase-cost') }}">-->
                <!--    </div>-->
                <!--</div>-->
                <!-- コメント -->
                <div class="form-group">
                    <label class="control-label">コメント</label>
                    <textarea class="form-control" name="comment" value="{{ $post_form->comment }}" style="height: 150px;">{{ $post_form->comment }}</textarea>
                </div>
                <!-- 画像 -->
                <!--<div class="form-group">-->
                <!--    <label class="control-label">画像</label>-->
                <!--    <input type="file" class="form-control-file" name="image">-->
                <!--</div>-->
                {{ csrf_field() }}
                <input type="submit" class="btn" value="更新!!">
            </form>
        </div>
    </div>
</div>
@endsection
