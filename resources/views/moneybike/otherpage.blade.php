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
                        <img width="100%" height="300px" style="margin-bottom: 5px;" src="storage/image/{{ $other_user->image_path }}">
                        <div class="content d-flex">
                            <a href="{{ action('Admin\MoneybikeController@following') }}" class="">フォロー数：32</a>
                            <a href="{{ action('Admin\MoneybikeController@following') }}" class="">フォロワー数：32</a>
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
                                <table>
                                    <tbody>
                                        <tr>
                                            <th colspan="7" class="cellTableHead">2020年8月</th>
                                        </tr>
                                        <tr>
                                            <th class="cellSunday">日</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th class="cellSaturday">土</th>
                                        </tr>
                                        <tr>
                                            <td class="cellSunday"> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td class="cellSaturday">1</td>
                                        </tr>
                                        <tr>
                                            <td class="cellSunday">2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td class="cellSaturday">8</td>
                                        </tr>
                                        <tr>
                                            <td class="cellSunday">9</td><td>10</td><td class="cellHoliday">11</td><td>12</td><td>13</td><td>14</td><td class="cellToday">15</td>
                                        </tr>
                                        <tr>
                                            <td class="cellSunday">16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td class="cellSaturday">22</td>
                                        </tr>
                                        <tr>
                                            <td class="cellSunday">23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td class="cellSaturday">29</td>
                                        </tr>
                                        <tr>
                                            <td class="cellSunday">30</td><td>31</td><td> </td><td> </td><td> </td><td> </td><td class="cellSaturday"> </td>
                                        </tr>
                                    </tbody>
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
                                                       <img  class="post-icon" src="storage/image/{{ $post->image_icon }}">
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