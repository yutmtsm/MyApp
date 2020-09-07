@extends('layouts.index')

@section('title', '新規バイク追加')

@section('content')
<div class="container">
    <h1>新規バイク追加</h1>
    <div class="row" style="width: 100%;">
        <div class="col-md-6 mx-auto" >
            <form action="#" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <!-- タイトル -->
                <div class="form-group">
                    <label class="control-label">メーカー</label>
                    <input type="text" class="form-control" name="manufacturer" value="{{ old('manufacturer') }}">
                </div>
                 <!--スポット -->
                <div class="form-group">
                    <label class="control-label">排気量</label>
                    <input type="text" class="form-control" name="engine_displacement" value="{{ old('engine_displacement') }}">
                </div>
                <!-- 使用金 -->
                <div class="d-flex align-items-center">
                    <div class="form-group">
                        <label class="control-label">車種</label>
                        <input type="text" class="form-control" name="type" value="{{ old('type') }}">
                    </div>
                    <div class="form-group" style="margin-left: 100px;">
                        <label class="control-label">年式</label>
                        <input type="text" class="form-control" name="model_year" value="{{ old('model_year') }}">年
                    </div>
                </div>
                <!-- コメント -->
                <div class="form-group">
                    <label class="control-label">コメント</label>
                    <textarea class="form-control" name="comment" value="{{ old('comment') }}" style="height: 150px;">{{ old('comment') }}</textarea>
                </div>
                <!-- 画像 -->
                <div class="form-group">
                    <label class="control-label">画像</label>
                    <input type="file" class="form-control-file" name="image">
                <!--</div>-->
                {{ csrf_field() }}
                <input type="submit" class="btn" value="投稿!!">
            </form>
        </div>
    </div>
</div>
@endsection
