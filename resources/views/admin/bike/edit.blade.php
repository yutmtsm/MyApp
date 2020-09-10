@extends('layouts.mypage')

@section('title', '新規バイク追加')

@section('content')
<div class="container">
    <h1>バイク編集</h1>
    <div class="row" style="width: 100%;">
        <div class="col-md-6 mx-auto" >
            <form action="{{ action('Admin\BikeController@update') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <!-- メーカー -->
                <div class="form-group">
                    <label class="control-label">メーカー</label>
                    <input type="text" class="form-control" name="manufacturer" value="{{ $mybike_form->manufacturer }}">
                </div>
                 <!--排気量 -->
                <div class="form-group">
                    <label class="control-label">排気量</label>
                    <input type="text" class="form-control" name="engine_displacement" value="{{ $mybike_form->engine_displacement }}">
                </div>
                <!-- 車種年式 -->
                <div class="d-flex align-items-center">
                    <div class="form-group">
                        <label class="control-label">車種</label>
                        <input type="text" class="form-control" name="type" value="{{ $mybike_form->type }}">
                    </div>
                    <div class="form-group" style="margin-left: 100px;">
                        <label class="control-label">年式</label>
                        <input type="text" class="form-control" name="model_year" value="{{ $mybike_form->model_year }}">
                    </div>
                </div>
                <h2 class="personal-title">その他情報</h2>
                <!-- その他情報 -->
                <div class="d-flex align-items-start">
                    <div class="form-group">
                        <label class="control-label">軽自動車税</label>
                        <input type="text" class="form-control" name="light_vehicle_tax" value="{{ $mybike_form->light_vehicle_tax }}">
                        <label class="control-label">重量税</label>
                        <input type="text" class="form-control" name="weight_tax" value="{{ $mybike_form->weight_tax }}">
                        <label class="control-label">自賠責保険</label>
                        <input type="text" class="form-control" name="liability_insurance" value="{{ $mybike_form->liability_insurance }}">
                    </div>
                    <div class="form-group" style="margin-left: 100px;">
                        <label class="control-label">任意保険</label>
                        <input type="text" class="form-control" name="voluntary_insurance" value="{{ $mybike_form->voluntary_insurance }}">
                        <label class="control-label">車検</label>
                        <input type="text" class="form-control" name="vehicle_inspection" value="{{ $mybike_form->vehicle_inspection }}">
                        <label class="control-label">駐車場代</label>
                        <input type="text" class="form-control" name="parking_fee" value="{{ $mybike_form->parking_fee }}">
                        <label class="control-label">消耗品費</label>
                        <input type="text" class="form-control" name="consumables" value="{{ $mybike_form->consumables }}">
                    </div>
                </div>
                <!-- 画像 -->
                <div class="form-group row">
                    <label class="control-label">バイク画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image">
                        <div class="form-text text-info">
                                設定中の画像: 
                                @if(isset($mybike_form->image_icon))
                                <img width="100%" height="300px" style="margin-bottom: 5px;" src="storage/image/bike{{ $mybike_form->image_path }}">
                                @else
                                <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/noimage.png">
                                ※設定中の画像はありません。
                                @endif
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                            </label>
                        </div>
                    </div>
                <!--</div>-->
                <input type="hidden" name="id" value="{{ $mybike_form->id }}">
                {{ csrf_field() }}
                <input type="submit" class="btn-primary add-btn" value="更新">
            </form>
        </div>
    </div>
</div>
@endsection
