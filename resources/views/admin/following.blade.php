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
                        <img width="100%" height="300px" style="margin-bottom: 5px;" src="storage/image/{{ $user->image_path }}">
                        <div class="content d-flex">
                            <a href="#" class="">フォロー数：32</a>
                            <a href="#" class="">フォロワー数：32</a>
                        </div>
                        <div class="content">
                            <p class="personal-title text-bold text-large text-ornament">ニックネーム</p>
                            <p class="personal-text">{{ $user->name}}</p>
                        </div>
                       <div class="content">
                            <p class="personal-title text-bold text-large text-ornament">性別</p>
                            <p class="personal-text">{{ $user->gender}}</p>
                        </div>
                        <div class="content">
                            <p class="personal-title text-bold text-large text-ornament">年齢</p>
                            <p class="personal-text">{{ $user->age}}</p>
                        </div>
                        <div class="content">
                            <p class="personal-title text-bold text-large text-ornament">マイバイク情報</p>
                            <p class="personal-text">MT-25</p>
                        </div>
                        <div class="content">
                            <div class="d-flex">
                                <a href="{{ action('Admin\MoneybikeController@addbike') }}" class="add-bike" href="#">バイク追加</a>
                                <a class="add-bike" href="#">バイク編集</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 真ん中コンテンツ -->
            <div class="col-md-8">
                <div class="row">
                    <!-- フォロー -->
                    <div class="col-md-6">
                        <div class="item">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">フォロー</div>
                                </div>
                               @foreach($users as $_user)
                                   <div class="post">
                                       <div class="row">
                                           <div class="col-md-12">
                                               <div class="post-info d-flex">
                                                   <div class="col-md-8 d-flex no-gutters">
                                                       <img  class="post-icon" src="/storage/image/{{ $_user->image_path }}">
                                                       <div class="post-name">{{ $_user->name }}</div>
                                                   </div>
                                                   <div class="follow-btn">
                                                       <a href="#" class="follow-button">フォロー</a>
                                                   </div>
                                                    @if ($user()->isFollowing($_user->id))
                                                    <form action="{{ route('unfollow', ['id' => $_user->id]) }}" method="POST">
                                                       {{ csrf_field() }}
                                                       {{ method_field('DELETE') }}
                                                       <button type="submit" class="btn btn-danger">フォロー解除</button>
                                                    </form>
                                                    @else
                                                    <form action="{{ route('follow', ['id' => $_user->id]) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-primary">フォローする</button>
                                                    </form>
                                                    @endif
                                                </div>
                                                
                                                    
                                               
                                               <div class="comment mt-3">
                                                   <p>{{ str_limit($_user->address, 1500) }}</p>
                                                </div>
                                               
                                               <div class="date text-right">
                                                   {{ $_user->image_path }}
                                               </div>
                                               
                                                @if ($user->isFollowed($_user->id))
                                                <div class="px-2">
                                                    <span class="px-1 bg-secondary text-light">フォローされています</span>
                                                </div>
                                                @endif
                                           </div>
                                       </div>
                                   </div>
                               @endforeach
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection