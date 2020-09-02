@extends('layouts.mypage')

@section('title', 'スポット検索')

@section('content')
<div class="container">
    <h1>スポット検索</h1>
    <!-- スポット検索 -->
    <div class="row">
        
        <!-- スポット検索 -->
        <div class="col-md-8">
            <div class="item">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-1">
                                <img  class="spot-icon" src="/storage/image/{{ $user->image_path }}">
                            </div>
                            <div class="col-md-10">
                                <form action="{{ action('Admin\MoneybikeController@search') }}" method="get">
                                    <div class="form-group row">
                                    
                                        <div class="col-md-11">
                                            <input type="text" class="form-control" placeholder="スポットを入力" name="cond_title" value={{ $cond_title }}>
                                        </div>
                                        <div class="col-md-1">
                                            {{ csrf_field() }}
                                            <input type="submit" class="btn btn-primary" value="検索">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="card-header">
                            <div class="card-title">スポットツイート</div>
                            <div class="d-flex">
                                <a class="new-post" href="{{ action('Admin\PostController@newpost') }}">新規投稿</a>
                                <a class="new-post" href="{{ action('Admin\PostController@newpost') }}" style="margin-left: 40px;">削除一覧</a>
                            </div>
                        </div>
                        @foreach($posts as $post)
                        
                            <div class="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                         <div class="title">
                                             <h2>{{ str_limit($post->title, 100) }}</h2>
                                        </div>
                                        <div class="post-info d-flex">
                                            <div class="col-md-8 d-flex no-gutters">
                                                <img  class="post-icon" src="/storage/image/{{ $post->image_icon }}">
                                                <div class="post-name">名前：{{ $post->user_name }}</div>
                                                <div class="post-spot">　エリア：{{ $post->spot }}</div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="spot-image">
                                                @if(isset($post->image_icon))
                                                    <img src="/storage/image/{{ $post->image_icon }}">
                                                @else
                                                    <img src="/storage/image/noimage.png">
                                                @endif
                                            </div>
                                            <div class="post-text">
                                                <div class="spot-comment mt-3">
                                                    <p>{{ str_limit($post->comment, 1500) }}</p>
                                                </div>
                                                <div class="detail-btn">
                                                    <a href="{{ action('Admin\PostController@detail', ['id' => $post->id]) }}">
                                                        <button type="button" class="btn btn-primary btn-xs active" data_but="btn-xs"><i class='fa fa-search'></i> 詳しく見る</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="date text-right">
                                            {{ $post->created_at }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        @endforeach
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- スポット検索ここまで -->
        
        <!-- おすすめユーザー -->
        <div class="col-md-4">
            <div class="item">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">未フォロワー</div>
                        
                    </div>
                    @foreach($followed_Users as $followed_User)
                        <div class="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="post-info d-flex">
                                        <a href="{{ action('MoneybikeController@otherpage', ['id' => $followed_User->id]) }}">
                                        <div class="col-md-8 d-flex no-gutters">
                                            <img  class="post-icon" src="/storage/image/{{ $followed_User->image_path }}">
                                            <div class="post-name">{{ $followed_User->name }}</div>
                                        </div>
                                        </a>
                                        
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
        <!-- おすすめユーザーここまで -->
        
    </div>
</div>
@endsection
