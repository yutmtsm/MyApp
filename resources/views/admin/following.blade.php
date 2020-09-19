@extends('layouts.common.common')
@section('css', 'mypage.css')

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
                                                       <img  class="post-icon" src="/storage/image/user/{{ $following_User->image_path }}">
                                                       <div class="post-name"><p>{{ $following_User->name }}</p></div>
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
                                               
                                                @if ($user->isFollowing($user->id))
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
                                                   <div class="d-flex no-gutters" style="margin: 0;">
                                                       <img  class="post-icon" src="/storage/image/user/{{ $followed_User->image_path }}">
                                                       <div class="post-name">{{ $followed_User->name }}</div>
                                                   </div>
                                                   </a>
                                                   <div class="follow-btn">
                                                        @if ($user->isFollowing($followed_User->id))
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
                                               
                                                @if ($user->isFollowing($user->id))
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