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
                        
                        @if(isset($user->image_path))
                        <img width="100%" height="300px" style="margin-bottom: 5px;" src="storage/image/user/{{ $user->image_path }}">
                        @else
                        <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/noimage.png">
                        @endif
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
                                    <img class="bike-icon" src="/storage/image/bike/{{ $mybike->image_path }}">
                                    <p class="bike-text"><p>{{ $mybike->manufacturer }}</p></p>
                                    <p class="bike-text">『{{ $mybike->type }}』( {{ $mybike->engine_displacement }} )</p>
                                    
                                    <!-- Modalの詳細ボタン -->
                                    <button type="button" class="bike-detail-btn btn w-10 h-25" style="padding: 0;" data-toggle="modal" data-target="#exampleModal{{ $mybike->id }}">
                                        <p>詳しく見る...</p>
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-lg" id="exampleModal{{ $mybike->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
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
                                                    <img class="bike-detail-icon w-50 h-auto" src="storage/image/bike/{{ $mybike->image_path }}">
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
                                              <a href="{{ action('Admin\BikeController@edit', ['id' => $mybike->id]) }}" class="btn btn-primary">編集</a>
                                              <a href="{{ action('Admin\BikeController@delete', ['id' => $mybike->id]) }}" class="btn btn-danger">削除</a>
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
                        <div class="item">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title text-center"><p>{{ $today->month }}月</p></div>
                                    <div class="d-flex">
                                        <a href="#">前の月</a>
                                        <a class="ml-auto" href="#">次の月</a>
                                    </div>
                                </div>
                                <table border="0" cellspacing="1" cellpadding="1" bgcolor="#CCCCCC" style="font: 12px; color: #666666;">
                                    <tr>
                                        <td align="center" colspan="7" bgcolor="#EEEEEE" height="18" style="color: #666666;">2020年11月</td>
                                    </tr>
                                    <!--
                                    @if(spending_today >= 1000)
                                        color: #A7F1FF;
                                    @elseif(spending_today >= 3000)
                                        color: #FF8856;
                                    @else
                                        color: #666666;
                                    @endif
                                    -->
                                    
                                    <tr>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">1</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">2</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">3</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">4</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">5</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">6</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">7</td>
                                    </tr>
                                    <tr>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">8</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">9</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">10</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">11</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">12</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">13</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">14</td>
                                    </tr>
                                    <tr>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">15</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">16</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">17</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">18</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">19</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">20</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">21</td>
                                    </tr>
                                    <tr>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">22</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">23</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">24</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">25</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">26</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">27</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">28</td>
                                    </tr>
                                    <tr>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">29</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">30</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">31</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">　</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">　</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">　</td>
                                        <td class="calendar-day" align="center" bgcolor="#FFFFFF" style="color: #666666;">　</td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#FFFFFF">&nbsp;</td>
                                        <td bgcolor="#FFFFFF">&nbsp;</td>
                                        <td bgcolor="#FFFFFF">&nbsp;</td>
                                        <td bgcolor="#FFFFFF">&nbsp;</td>
                                        <td bgcolor="#FFFFFF">&nbsp;</td>
                                        <td bgcolor="#FFFFFF">&nbsp;</td>
                                        <td bgcolor="#FFFFFF">&nbsp;</td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- ツイート部分 -->
                    <div class="col-md-6">
                        <div class="item">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">スポットツイート</div>
                                    <div class="d-flex">
                                        <a class="new-post" href="{{ action('Admin\PostController@newpost') }}">新規投稿</a>
                                        <a class="new-post" href="{{ action('Admin\PostController@newpost') }}" style="margin-left: 40px;">削除一覧</a>
                                    </div>
                                </div>
                               <!-- 新着順に表示 -->
                               <!--<section class="scroll_area"-->
                               <!--data-infinite-scroll='{-->
                               <!--"path": ".pagination a[rel=next]",-->
                               <!--"append": ".post"-->
                               <!--}'>-->
                               @foreach($posts as $post)
                               <a href="{{ action('Admin\PostController@detail', ['id' => $post->id]) }}">
                                   <div class="post">
                                       <div class="row">
                                           <div class="col-md-12">
                                               <div class="post-info d-flex">
                                                   <div class="col-md-8 d-flex no-gutters">
                                                       
                                                       @if(isset($post->image_icon))
                                                       <img  class="post-icon" src="/storage/image/user/{{ $post->image_icon }}">
                                                        @else
                                                        <img class="post-icon" src="/storage/image/noimage.png">
                                                        @endif
                                                       <div class="post-name">{{ $post->user_name }}</div>
                                                   </div>
                                               </div>
                                               <div class="title">
                                                   <h2>{{ str_limit($post->title, 100) }}</h2>
                                               </div>
                                               
                                               <div class="comment mt-3">
                                                   <p>{{ str_limit($post->comment, 1500) }}</p>
                                                </div>
                                               
                                               <div class="date text-right">
                                                   {{ $post->created_at }}
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                 </a>
                         
                               @endforeach
                               <!--</section>-->
                               {{ $posts->links() }}
                               <!--<p>下にスクロールしてね</p>-->
                                <!--<div class="card-body" style="max-height: 600px;">-->
                                <!--    <a data-height="600px" class="twitter-timeline" href="https://twitter.com/yousuck2020?ref_src=twsrc%5Etfw">Tweets by yousuck2020</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection