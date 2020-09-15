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
                            <a href="{{ action('MoneybikeController@other_followers', ['id' => $other_user->id]) }}" class="">フォロー数：{{ $following_Count }}</a>
                            <a href="{{ action('MoneybikeController@other_followers', ['id' => $other_user->id]) }}" class="">フォロワー数：{{ $followed_Count }}</a>
                        </div>
                        <div class="content">
                            <p class="personal-title text-bold text-large text-ornament">ニックネーム</p>
                            <div class="d-flex">
                                <p class="personal-text">{{ $other_user->name}}</p>
                                <div class="follow-btn">
                                    
                                    @if ($login_user->isFollowing($other_user->id))
                                    <form action="{{ route('unfollow', ['id' => $other_user->id]) }}" method="POST">
                                       {{ csrf_field() }}
                                       {{ method_field('DELETE') }}
                                       <button type="submit" class="btn btn-danger">{{ $other_user->name}}さんのフォロー解除</button>
                                    </form>
                                    @else
                                    <form action="{{ route('follow', ['id' => $other_user->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">{{ $other_user->name}}さんをフォローする</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
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
                            @foreach($other_mybikes as $other_mybike)
                                <div class="d-flex">
                                    <img class="bike-icon" src="/storage/image/bike/{{ $other_mybike->image_path }}">
                                    <p class="bike-text"><p>{{ $other_mybike->manufacturer }}</p></p>
                                    <p class="bike-text">『{{ $other_mybike->type }}』( {{ $other_mybike->engine_displacement }} )</p>
                                    
                                    <!-- Modalの詳細ボタン -->
                                    <button type="button" class="bike-detail-btn btn w-10 h-25" style="padding: 0;" data-toggle="modal" data-target="#exampleModal{{ $other_mybike->id }}">
                                        <p class="btn btn-primary">詳細</p>
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-lg" id="exampleModal{{ $other_mybike->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
                                      <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModal3Label">
                                                <p class="bike-text"><p>{{ $other_mybike->manufacturer }}『{{ $other_mybike->type }}』( {{ $other_mybike->engine_displacement }} )の詳細情報</p>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                                <div class="d-flex">
                                                    <img class="bike-detail-icon w-50 h-auto" src="storage/image/bike/{{ $other_mybike->image_path }}">
                                                    <div class="bike-detail">
                                                        <table>
                                                            <div class="bike-detail-title">基本情報</div>
                                                            <tr>
                                                                <th>メーカー</th>
                                                                <td>{{ $other_mybike->manufacturer }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>車種</th>
                                                                <td>{{ $other_mybike->type }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>排気量</th>
                                                                <td>{{ $other_mybike->engine_displacement }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>年式</th>
                                                                <td>{{ $other_mybike->model_year }}</td>
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
                                                                <td>{{ $other_mybike->light_vehicle_tax }}円</td>
                                                            </tr>
                                                            <tr>
                                                                <th>重量税</th>
                                                                <td>{{ $other_mybike->weight_tax }}円</td>
                                                            </tr>
                                                            <tr>
                                                                <th>自賠責保険</th>
                                                                <td>{{ $other_mybike->liability_insurance }}円</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    
                                                    <div class="bike-detail">
                                                        <table>
                                                            <div class="bike-detail-title">変動日</div>
                                                            <tr>
                                                                <th>任意保険</th>
                                                                <td>{{ $other_mybike->voluntary_insurance }}円</td>
                                                            </tr>
                                                            <tr>
                                                                <th>車検</th>
                                                                <td>{{ $other_mybike->vehicle_inspection }}円</td>
                                                            </tr>
                                                            <tr>
                                                                <th>駐車場代</th>
                                                                <td>{{ $other_mybike->parking_fee }}円</td>
                                                            </tr>
                                                            <tr>
                                                                <th>消耗品費</th>
                                                                <td>{{ $other_mybike->consumables }}円</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                          </div>
                                          <div class="modal-footer">
                                              
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
                                <a href="#" class="add-bike" href="#"></a>
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
                                    <div class="card-title text-center"><p>{{ $month }}月</p></div>
                                    <div class="d-flex">
                                        <a href="#">前の月</a>
                                        <a class="ml-auto" href="#">次の月</a>
                                    </div>
                                </div>
                                
                                <table width=100% bgcolor="#aaaaaa" cellspacing=1 cellpadding=4>
                                    <tr bgcolor="#f0f8ff" align=center>
                                        <td width=14%><font color="#ff0000"><b>日</b></font></td>
                                        <td width=14%><font color="#000000"><b>月</b></font></td>
                                        <td width=14%><font color="#000000"><b>火</b></font></td>
                                        <td width=14%><font color="#000000"><b>水</b></font></td>
                                        <td width=14%><font color="#000000"><b>木</b></font></td>
                                        <td width=14%><font color="#000000"><b>金</b></font></td>
                                        <td width=14%><font color="#0000ff"><b>土</b></font></td>
                                    </tr>
                                    <tr bgcolor="#ffffff" valign=top>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[0]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[0]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[0]->jDay)
                                            <?php $total_spending01 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending01 == 0)
                                
                                            @else
                                            {{ number_format($total_spending01) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[1]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[1]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[1]->jDay)
                                            <?php $total_spending02 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending02 == 0)
                                
                                            @else
                                            {{ number_format($total_spending02) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[2]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[2]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[2]->jDay)
                                            <?php $total_spending03 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending03 == 0)
                                
                                            @else
                                            {{ number_format($total_spending03) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[3]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[3]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[3]->jDay)
                                            <?php $total_spending04 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending04 == 0)
                                
                                            @else
                                            {{ number_format($total_spending04) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[4]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[4]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[4]->jDay)
                                            <?php $total_spending05 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending05 == 0)
                                
                                            @else
                                            {{ number_format($total_spending05) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[5]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[5]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[5]->jDay)
                                            <?php $total_spending06 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending06 == 0)
                                
                                            @else
                                            {{ number_format($total_spending06) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[6]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[6]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[6]->jDay)
                                            <?php $total_spending07 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending07 == 0)
                                
                                            @else
                                            {{ number_format($total_spending07) }}円
                                            @endif
                                            </font>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#ffffff" valign=top>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[7]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[7]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[7]->jDay)
                                            <?php $total_spending08 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending08 == 0)
                                
                                            @else
                                            {{ number_format($total_spending08) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[8]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[8]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[8]->jDay)
                                            <?php $total_spending09 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending09 == 0)
                                
                                            @else
                                            {{ number_format($total_spending09) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[9]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[9]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[9]->jDay)
                                            <?php $total_spending10 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending10 == 0)
                                
                                            @else
                                            {{ number_format($total_spending10) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[10]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[10]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[10]->jDay)
                                            <?php $total_spending11 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending11 == 0)
                                
                                            @else
                                            {{ number_format($total_spending11) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[11]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[11]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[11]->jDay)
                                            <?php $total_spending12 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending12 == 0)
                                
                                            @else
                                            {{ number_format($total_spending12) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[12]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[12]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[12]->jDay)
                                            <?php $total_spending13 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending13 == 0)
                                
                                            @else
                                            {{ number_format($total_spending13) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[13]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[13]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[13]->jDay)
                                            <?php $total_spending14 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending14 == 0)
                                
                                            @else
                                            {{ number_format($total_spending14) }}円
                                            @endif
                                            </font>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#ffffff" valign=top>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[14]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[14]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[14]->jDay)
                                            <?php $total_spending15 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending15 == 0)
                                
                                            @else
                                            {{ number_format($total_spending15) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[15]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[15]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[15]->jDay)
                                            <?php $total_spending16 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending16 == 0)
                                
                                            @else
                                            {{ number_format($total_spending16) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[16]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[16]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[16]->jDay)
                                            <?php $total_spending17 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending17 == 0)
                                
                                            @else
                                            {{ number_format($total_spending17) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[17]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[17]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[17]->jDay)
                                            <?php $total_spending18 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending18 == 0)
                                
                                            @else
                                            {{ number_format($total_spending18) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[18]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[18]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[18]->jDay)
                                            <?php $total_spending19 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending19 == 0)
                                
                                            @else
                                            {{ number_format($total_spending19) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[19]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[19]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[19]->jDay)
                                            <?php $total_spending20 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending20 == 0)
                                
                                            @else
                                            {{ number_format($total_spending20) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[20]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[20]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[20]->jDay)
                                            <?php $total_spending21 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending21 == 0)
                                
                                            @else
                                            {{ number_format($total_spending21) }}円
                                            @endif
                                            </font>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#ffffff" valign=top>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[21]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[21]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[21]->jDay)
                                            <?php $total_spending22 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending22 == 0)
                                
                                            @else
                                            {{ number_format($total_spending22) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[22]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[22]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[22]->jDay)
                                            <?php $total_spending23 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending23 == 0)
                                
                                            @else
                                            {{ number_format($total_spending23) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[23]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[23]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[23]->jDay)
                                            <?php $total_spending24 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending24 == 0)
                                
                                            @else
                                            {{ number_format($total_spending24) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[24]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[24]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[24]->jDay)
                                            <?php $total_spending25 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending25 == 0)
                                
                                            @else
                                            {{ number_format($total_spending25) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[25]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[25]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[25]->jDay)
                                            <?php $total_spending26 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending26 == 0)
                                
                                            @else
                                            {{ number_format($total_spending26) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[26]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[26]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[26]->jDay)
                                            <?php $total_spending27 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending27 == 0)
                                
                                            @else
                                            {{ number_format($total_spending27) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[27]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[27]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[27]->jDay)
                                            <?php $total_spending28 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending28 == 0)
                                
                                            @else
                                            {{ number_format($total_spending28) }}円
                                            @endif
                                            </font>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#ffffff" valign=top>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[28]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[28]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[28]->jDay)
                                            <?php $total_spending29 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending29 == 0)
                                
                                            @else
                                            {{ number_format($total_spending29) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[29]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[29]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[29]->jDay)
                                            <?php $total_spending30 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending30 == 0)
                                
                                            @else
                                            {{ number_format($total_spending30) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[30]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[30]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[30]->jDay)
                                            <?php $total_spending31 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending31 == 0)
                                
                                            @else
                                            {{ number_format($total_spending31) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[31]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[31]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[31]->jDay)
                                            <?php $total_spending += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending32 == 0)
                                
                                            @else
                                            {{ number_format($total_spending32) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[32]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[32]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[32]->jDay)
                                            <?php $total_spending += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending33 == 0)
                                
                                            @else
                                            {{ number_format($total_spending33) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[33]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[33]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[33]->jDay)
                                            <?php $total_spending += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending34 == 0)
                                
                                            @else
                                            {{ number_format($total_spending34) }}円
                                            @endif
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[34]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[34]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            <?php $post_day = substr($day_cost->created_at, 8, 2); ?>
                                            @if($post_day == $calendar_day[34]->jDay)
                                            <?php $total_spending += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            @if($total_spending35 == 0)
                                
                                            @else
                                            {{ number_format($total_spending35) }}円
                                            @endif
                                            </font>
                                        </td>
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
                                                       <img class="post-icon" src="/storage/image/user/{{ $post->image_icon }}">
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