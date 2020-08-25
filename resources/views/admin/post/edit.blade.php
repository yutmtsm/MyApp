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
                <div class="form-group">
                    <label class="control-label">スポット</label>
                    <input type="text" class="form-control" name="spot" value="{{ $post_form->spot }}">
                </div>
                <!-- 使用金 -->
                <div class="d-flex align-items-center">
                    <div class="form-group">
                        <label class="control-label">施設費</label>
                        <input type="text" class="form-control" name="addmission_fee" value="{{ $post_form->addmission_fee }}">
                    </div>
                    <div class="form-group" style="margin-left: 100px;">
                        <label class="control-label">購入金</label>
                        <input type="text" class="form-control" name="purchase_cost" value="{{ $post_form->purchase_cost }}">
                    </div>
                </div>
                <!-- コメント -->
                <div class="form-group">
                    <label class="control-label">コメント</label>
                    <textarea class="form-control" name="comment" value="{{ $post_form->comment }}" style="height: 150px;">{{ $post_form->comment }}</textarea>
                </div>
                <!-- 画像 -->
                <div class="form-group">
                    <label class="control-label">画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image">
                        <div class="form-text text-info">
                                設定中: {{ $post_form->image_path }}
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                            </label>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="{{ $post_form->id }}">
                {{ csrf_field() }}
                <input type="submit" class="btn" value="更新!!">
            </form>
        </div>
    </div>
</div>
@endsection
