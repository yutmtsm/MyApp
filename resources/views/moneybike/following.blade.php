@extends('layouts.mypage')

@section('title', 'マイページ')

@section('content')
    <div class="container">
        <h1>{{ $other_user->name}}さんのページ</h1>
        <div class="row">
            <!-- 左コンテンツ -->
            <div class="col-md-4">
                <div class="section">
                    <div class="card">
                        @if(isset($other_user->image_path))
                        <img width="100%" height="300px" style="margin-bottom: 5px;" src="storage/image/{{ $other_user->image_path }}">
                        @else
                        <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/noimage.png">
                        @endif
                        <div class="content d-flex">
                            <a href="{{ action('MoneybikeController@other_followers') }}" class="">フォロー数：{{ $following_Count }}</a>
                            <a href="{{ action('MoneybikeController@other_followers') }}" class="">フォロワー数：{{ $followed_Count }}</a>
                        </div>
                        
                        <div class="content">
                            <p class="personal-title text-bold text-large text-ornament">ニックネーム</p>
                            <p class="personal-text">{{ $other_user->name}}</p>
                        </div>
                       <div class="content">
                            <p class="personal-title text-bold text-large text-ornament">性別</p>
                            <p class="personal-text">{{ $other_user->gender}}</p>
                        </div>
                        <div class="content">
                            <p class="personal-title text-bold text-large text-ornament">年齢</p>
                            <p class="personal-text">{{ $other_user->age}}</p>
                        </div>
                        <div class="content">
                            <p class="personal-title text-bold text-large text-ornament">マイバイク情報</p>
                            <p class="personal-text">MT-25</p>
                        </div>
                        <div class="content">
                            <div class="d-flex">
                                <a href="#" class="add-bike" href="#">バイク追加</a>
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
                               @foreach($following_Users as $following_User)
                                   <div class="post">
                                       <div class="row">
                                           <div class="col-md-12">
                                               <div class="post-info d-flex">
                                                   <a href="{{ action('MoneybikeController@otherpage', ['id' => $following_User->id]) }}">
                                                   <div class="col-md-8 d-flex no-gutters">
                                                       <img  class="post-icon" src="/storage/image/{{ $following_User->image_path }}">
                                                       <div class="post-name">{{ $following_User->name }}</div>
                                                   </div>
                                                   </a>
                                                   <div class="follow-btn">
                                                        @if ($user->isFollowing($following_User->id))
                                                        <form action="{{ route('unfollow', ['id' => $following_User->id]) }}" method="POST">
                                                           {{ csrf_field() }}
                                                           {{ method_field('DELETE') }}
                                                           <button type="submit" class="btn btn-danger">フォロー解除</button>
                                                        </form>
                                                        @else
                                                        <form action="{{ route('follow', ['id' => $following_User->id]) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-primary">フォローする</button>
                                                            <!--@if (!$user->isFollowing($following_User->id))-->
                                                            <!--    <div class="px-2">-->
                                                            <!--        <span class="px-1 bg-secondary text-light">フォローされています</span>-->
                                                            <!--    </div>-->
                                                            <!--@endif-->
                                                        </form>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                    
                                               
                                               <div class="comment mt-3">
                                                   <p>{{ str_limit($following_User->address, 1500) }}</p>
                                                </div>
                                               
                                               <div class="date text-right">
                                                   {{ $following_User->image_path }}
                                               </div>
                                               
                                                
                                           </div>
                                       </div>
                                   </div>
                               @endforeach
                              
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-6">
                        <div class="item">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">フォロワー</div>
                                </div>
                               @foreach($followed_Users as $followed_User)
                                   <div class="post">
                                       <div class="row">
                                           <div class="col-md-12">
                                               <div class="post-info d-flex">
                                                   <a href="{{ action('MoneybikeController@otherpage', ['id' => $followed_User->id]) }}">
                                                   <div class="col-md-8 d-flex no-gutters">
                                                       
                                                       @if(isset($followed_User->image_path))
                                                       <img  class="post-icon" src="/storage/image/{{ $followed_User->image_path }}">
                                                        @else
                                                        <img class="post-icon" src="/storage/image/noimage.png">
                                                        @endif
                                                       <div class="post-name">{{ $followed_User->name }}</div>
                                                   </div>
                                                   </a>
                                                   
                                                   <div class="follow-btn">
                                                        @if ($other_user->isFollowing($followed_User->id))
                                                        <form action="{{ route('unfollow', ['id' => $followed_User->id]) }}" method="POST">
                                                           {{ csrf_field() }}
                                                           {{ method_field('DELETE') }}
                                                           <button type="submit" class="btn btn-danger">フォロー解除</button>
                                                        </form>
                                                        @else
                                                        <form action="{{ route('follow', ['id' => $followed_User->id]) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-primary">フォローする</button>
                                                        </form>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                    
                                               
                                               <div class="comment mt-3">
                                                   <p>{{ str_limit($followed_User->address, 1500) }}</p>
                                                </div>
                                               
                                               <div class="date text-right">
                                                   {{ $followed_User->image_path }}
                                               </div>
                                               
                                                
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