@extends('layouts.mypage')

@section('title', 'マイページ')

@section('content')
    <div class="container">
        <h1>マイページ</h1>
        <div class="row">
            <!-- 左コンテンツ -->
            <div class="col-md-4">
                <div class="section">
                    <div class="card">
                        <img width="100%" height="400px" src="/storage/sample.jpeg">
                        <div class="content">
                            <p class="text-bold text-large text-ornament">ニックネーム</p>
                            <p>{{ $user->name}}</p>
                        </div>
                       <div class="content">
                            <p class="text-bold text-large text-ornament">性別</p>
                            <p>{{ $user->gender}}</p>
                        </div>
                        <div class="content">
                            <p class="text-bold text-large text-ornament">年齢</p>
                            <p>{{ $user->age}}</p>
                        </div>
                        <div class="content">
                            <p class="text-bold text-large text-ornament">マイバイク情報</p>
                            <p>MT-25</p>
                        </div>
                        <div class="content">
                            <p class="text-center">
                                 <a class="btn btn-sub" href="#">編集する</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 真ん中コンテンツ -->
            <div class="col-md-8">
                <div class="row">
                    <!-- 支出 -->
                    <div class="col-md-6">
                        <div class="item">
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection