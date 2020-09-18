@extends('layouts.mypage')

@section('title', 'マイページ')

@section('content')
    <div class="container">
        <h1>マイページ</h1>
        <div class="row">
            <!-- 左コンテンツ -->
            @include('layouts.common.profile')
            <!-- 真ん中コンテンツ -->
            <div class="col-md-8">
                <div class="row">
                    <!-- 支出 -->
                    <div class="col-md-6">
                        <div class="item" style="margin-bottom: 20px;">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">支出一覧</div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">年間支出</th>
                                                <th scope="col">当月支出</th>
                                                <th scope="col">当日支出</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>120,000円</td>
                                                <td>5,400円</td>
                                                <td>300円</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>前月比：+10%</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- カレンダー -->
                        @include('layouts.common.calendar')
                    </div>
                    <!-- ツイート部分 -->
                    <div class="col-md-6">
                        @include('layouts.common.top_tweet')
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection