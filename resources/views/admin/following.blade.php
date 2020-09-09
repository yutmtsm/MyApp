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
                            <a href="{{ action('Admin\MoneybikeController@following') }}" class="">フォロー数：{{ $following_Count }}</a>
                            <a href="{{ action('Admin\MoneybikeController@following') }}" class="">フォロワー数：{{ $followed_Count }}</a>
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
                            @foreach($mybikes as $mybike)
                                <div class="d-flex">
                                    <img class="bike-icon" src="storage/image/{{ $mybike->image_path }}">
                                    <p class="bike-text"><p>{{ $mybike->manufacturer }}</p></p>
                                    <p class="bike-text">『{{ $mybike->type }}』( {{ $mybike->engine_displacement }} )</p>
                                    
                                    <!-- Modalの詳細ボタン -->
                                    <button type="button" class="bike-detail-btn btn w-10 h-25" style="padding: 0;" data-toggle="modal" data-target="#exampleModal3">
                                        <p>詳しく見る...</p>
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-lg" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                                      <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModal3Label">
                                                <p class="bike-text"><p>{{ $mybike->manufacturer }}『{{ $mybike->type }}』( {{ $mybike->engine_displacement }} )の詳細情報</p>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                                <div class="d-flex">
                                                    <img class="bike-detail-icon w-50 h-auto" src="storage/image/{{ $mybike->image_path }}">
                                                    <div class="bike-detail">
                                                        <table>
                                                            <div class="bike-detail-title">基本情報</div>
                                                            <tr>
                                                                <th>メーカー</th>
                                                                <td>{{ $mybike->manufacturer }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>車種</th>
                                                                <td>{{ $mybike->type }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>排気量</th>
                                                                <td>{{ $mybike->engine_displacement }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>年式</th>
                                                                <td>{{ $mybike->model_year }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                
                                                <div class="d-flex">
                                                    <div class="bike-detail">
                                                        <table>
                                                            <div class="bike-detail-title">固定費</div>
                                                            <tr>
                                                                <th>軽自動車税</th>
                                                                <td>{{ $mybike->light_vehicle_tax }}円</td>
                                                            </tr>
                                                            <tr>
                                                                <th>重量税</th>
                                                                <td>{{ $mybike->weight_tax }}円</td>
                                                            </tr>
                                                            <tr>
                                                                <th>自賠責保険</th>
                                                                <td>{{ $mybike->liability_insurance }}円</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    
                                                    <div class="bike-detail">
                                                        <table>
                                                            <div class="bike-detail-title">変動日</div>
                                                            <tr>
                                                                <th>任意保険</th>
                                                                <td>{{ $mybike->voluntary_insurance }}円</td>
                                                            </tr>
                                                            <tr>
                                                                <th>車検</th>
                                                                <td>{{ $mybike->vehicle_inspection }}円</td>
                                                            </tr>
                                                            <tr>
                                                                <th>駐車場代</th>
                                                                <td>{{ $mybike->parking_fee }}円</td>
                                                            </tr>
                                                            <tr>
                                                                <th>消耗品費</th>
                                                                <td>{{ $mybike->consumables }}円</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">編集</button>
                                            <a href="{{ action('Admin\BikeController@delete', ['id' => $mybike->id]) }}">削除</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- Modalここまで -->
                                </div>
                            @endforeach
                        </div>
                        <div class="content">
                            <div class="d-flex">
                                <a class="add-bike" href="{{ action('Admin\BikeController@add') }}">バイク追加</a>
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
                                                       <img  class="post-icon" src="/storage/image/{{ $followed_User->image_path }}">
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