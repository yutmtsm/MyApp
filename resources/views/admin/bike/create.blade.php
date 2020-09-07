@extends('layouts.mypage')

@section('title', '新規バイク追加')

@section('content')
<div class="container">
    <h1>新規バイク追加</h1>
    <div class="row" style="width: 100%;">
        <div class="col-md-6 mx-auto" >
            <form action="{{ action('Admin\BikeController@create') }}" method="post" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" name="manufacturer" value="{{ old('manufacturer') }}">
                </div>
                 <!--排気量 -->
                <div class="form-group">
                    <label class="control-label">排気量</label>
                    <input type="text" class="form-control" name="engine_displacement" value="{{ old('engine_displacement') }}">
                </div>
                <!-- 車種年式 -->
                <div class="d-flex align-items-center">
                    <div class="form-group">
                        <label class="control-label">車種</label>
                        <input type="text" class="form-control" name="type" value="{{ old('type') }}">
                    </div>
                    <div class="form-group" style="margin-left: 100px;">
                        <label class="control-label">年式</label>
                        <input type="text" class="form-control" name="model_year" value="{{ old('model_year') }}">
                    </div>
                </div>
                <h2 class="personal-title">その他情報</h2>
                <!-- その他情報 -->
                <div class="d-flex align-items-start">
                    <div class="form-group">
                        <label class="control-label">軽自動車税</label>
                        <input type="text" class="form-control" name="light_vehicle_tax" value="{{ old('light_vehicle_tax') }}">
                        <label class="control-label">重量税</label>
                        <input type="text" class="form-control" name="weight_tax" value="{{ old('weight_tax') }}">
                        <label class="control-label">自賠責保険</label>
                        <input type="text" class="form-control" name="liability_insurance" value="{{ old('liability_insurance') }}">
                    </div>
                    <div class="form-group" style="margin-left: 100px;">
                        <label class="control-label">任意保険</label>
                        <input type="text" class="form-control" name="voluntary_insurance" value="{{ old('voluntary_insurance') }}">
                        <label class="control-label">車検</label>
                        <input type="text" class="form-control" name="vehicle_inspection" value="{{ old('vehicle_inspection') }}">
                        <label class="control-label">駐車場代</label>
                        <input type="text" class="form-control" name="parking_fee" value="{{ old('parking_fee') }}">
                        <label class="control-label">消耗品費</label>
                        <input type="text" class="form-control" name="consumables" value="{{ old('consumables') }}">
                    </div>
                </div>
                <!-- 画像 -->
                <div class="form-group">
                    <label class="control-label">バイク画像</label>
                    <input type="file" class="form-control-file" name="image">
                <!--</div>-->
                {{ csrf_field() }}
                <input type="submit" class="btn-primary add-btn" value="新規追加">
            </form>
        </div>
    </div>
</div>
@endsection
