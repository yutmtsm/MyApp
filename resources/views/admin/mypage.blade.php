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
                                    <div class="card-title text-center"><p>{{ $month }}月</p></div>
                                    <div class="d-flex">
                                        <a href="#">前の月</a>
                                        <a class="ml-auto" href="#">次の月</a>
                                    </div>
                                </div>
                                
                                <table width=100% bgcolor="#aaaaaa" cellspacing=1 cellpadding=4>
                                    <tr bgcolor="#f0f8ff" align=center>
                                        <td width=14%><font color="#ff0000"><b></b></font></td>
                                        <td width=14%><font color="#000000"><b></b></font></td>
                                        <td width=14%><font color="#000000"><b></b></font></td>
                                        <td width=14%><font color="#000000"><b></b></font></td>
                                        <td width=14%><font color="#000000"><b></b></font></td>
                                        <td width=14%><font color="#000000"><b></b></font></td>
                                        <td width=14%><font color="#0000ff"><b></b></font></td>
                                    </tr>
                                    <tr bgcolor="#ffffff" valign=top>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;1</b></font> <font size="-1">@if($today == 1)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-01 00:00:00")
                                            <?php $total_spending01 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending01 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;2</b></font> <font size="-1">@if($today == 2)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-02 00:00:00")
                                            <?php $total_spending02 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending02 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;3</b></font> <font size="-1">@if($today == 3)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-03 00:00:00")
                                            <?php $total_spending03 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending03 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;4</b></font> <font size="-1">@if($today == 4)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-04 00:00:00")
                                            <?php $total_spending04 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending04 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;5</b></font> <font size="-1">@if($today == 5)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-05 00:00:00")
                                            <?php $total_spending05 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending05 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;6</b></font> <font size="-1">@if($today == 6)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-06 00:00:00")
                                            <?php $total_spending06 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending06 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;7</b></font> <font size="-1">@if($today == 7)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-07 00:00:00")
                                            <?php $total_spending07 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending07 }}
                                            </font>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#ffffff" valign=top>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;8</b></font> <font size="-1">@if($today == 8)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-08 00:00:00")
                                            <?php $total_spending08 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending08 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;9</b></font> <font size="-1">@if($today == 9)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-09 00:00:00")
                                            <?php $total_spending09 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending09 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;10</b></font> <font size="-1">@if($today == 10)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-10 00:00:00")
                                            <?php $total_spending10 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending10 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;11</b></font> <font size="-1">@if($today == 11)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-11 00:00:00")
                                            <?php $total_spending11 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending11 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;12</b></font> <font size="-1">@if($today == 12)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-12 00:00:00")
                                            <?php $total_spending12 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending12 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;13</b></font> <font size="-1">@if($today == 13)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-13 00:00:00")
                                            <?php $total_spending13 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending13 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;14</b></font> <font size="-1">@if($today == 14)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-14 00:00:00")
                                            <?php $total_spending14 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending14 }}
                                            </font>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#ffffff" valign=top>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;15</b></font> <font size="-1">@if($today == 15)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-15 00:00:00")
                                            <?php $total_spending15 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending15 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;16</b></font> <font size="-1">@if($today == 16)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-16 00:00:00")
                                            <?php $total_spending16 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending16 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;17</b></font> <font size="-1">@if($today == 17)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-17 00:00:00")
                                            <?php $total_spending17 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending17 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;18</b></font> <font size="-1">@if($today == 18)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-18 00:00:00")
                                            <?php $total_spending18 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending18 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;19</b></font> <font size="-1">@if($today == 19)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-19 00:00:00")
                                            <?php $total_spending19 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending19 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;20</b></font> <font size="-1">@if($today == 20)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-20 00:00:00")
                                            <?php $total_spending20 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending20 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;21</b></font> <font size="-1">@if($today == 21)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-21 00:00:00")
                                            <?php $total_spending21 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending21 }}
                                            </font>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#ffffff" valign=top>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;22</b></font> <font size="-1">@if($today == 22)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-22 00:00:00")
                                            <?php $total_spending22 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending22 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;23</b></font> <font size="-1">@if($today == 23)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-23 00:00:00")
                                            <?php $total_spending23 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending23 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;24</b></font> <font size="-1">@if($today == 24)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-24 00:00:00")
                                            <?php $total_spending24 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending24 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;25</b></font> <font size="-1">@if($today == 25)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-25 00:00:00")
                                            <?php $total_spending25 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending25 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;26</b></font> <font size="-1">@if($today == 26)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-26 00:00:00")
                                            <?php $total_spending26 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending26 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;27</b></font> <font size="-1">@if($today == 27)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-27 00:00:00")
                                            <?php $total_spending27 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending27 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;28</b></font> <font size="-1">@if($today == 28)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-28 00:00:00")
                                            <?php $total_spending28 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending28 }}
                                            </font>
                                        </td>
                                    </tr>
                                    <tr bgcolor="#ffffff" valign=top>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;29</b></font> <font size="-1">@if($today == 29)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-29 00:00:00")
                                            <?php $total_spending29 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending29 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;30</b></font> <font size="-1">@if($today == 30)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-30 00:00:00")
                                            <?php $total_spending30 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending30 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;31</b></font> <font size="-1">@if($today == 31)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-31 00:00:00")
                                            <?php $total_spending31 += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending31 }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;</b></font> <font size="-1"></font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-011 00:00:00")
                                            <?php $total_spending += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;</b></font> <font size="-1"></font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-011 00:00:00")
                                            <?php $total_spending += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;</b></font> <font size="-1"></font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-011 00:00:00")
                                            <?php $total_spending += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending }}
                                            </font>
                                        </td>
                                        <td height=90><font color="#000000"><font size="+1"><b>&nbsp;</b></font> <font size="-1"></font></font><br>
                                            <font size="-1">
                                            @foreach($day_costs as $day_cost)
                                            @if($day_cost->created_at == "2020-$month-011 00:00:00")
                                            <?php $total_spending += $day_cost->addmission_fee + $day_cost->purchase_cost ?>
                                            @endif
                                            @endforeach
                                            {{ $total_spending }}
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