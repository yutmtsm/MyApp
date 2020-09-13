@extends('layouts.mypage')

@section('title', 'お金管理')

@section('content')
<div class="container">
    <h1>支出一覧</h1>
    <!-- スポット検索 -->
    <div class="row">
        
        <!-- 右コンテンツ -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-header d-flex">
                        <h4 class="card-title personal-title">年間支出：120000円　</h4>
                        <h4 class="card-title personal-title">当月支出：4000円</h4>
                    </div>
                </div>
            </div>
        
            <div class="card" style="margin-top: 10px;">
                <div class="card-body">
                    <div class="card-title">8月</div>
                    <div class="card-header d-flex">
                        <p class="card-title">前の月</p>
                        <p class="card-title">次の月</p>
                    </div>
                </div>
            </div>
            
            <div class="card" style="margin-top: 10px;">
                <div class="card-body">
                    
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
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-01 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;2</b></font> <font size="-1">@if($today == 2)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-02 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;3</b></font> <font size="-1">@if($today == 3)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-03 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;4</b></font> <font size="-1">@if($today == 4)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-04 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;5</b></font> <font size="-1">@if($today == 5)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-05 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;6</b></font> <font size="-1">@if($today == 6)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-06 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;7</b></font> <font size="-1">@if($today == 7)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-07 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                        </tr>
                        <tr bgcolor="#ffffff" valign=top>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;8</b></font> <font size="-1">@if($today == 8)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-08 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;9</b></font> <font size="-1">@if($today == 9)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-09 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;10</b></font> <font size="-1">@if($today == 10)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-10 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;11</b></font> <font size="-1">@if($today == 11)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-11 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;12</b></font> <font size="-1">@if($today == 12)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-12 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;13</b></font> <font size="-1">@if($today == 13)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-13 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;14</b></font> <font size="-1">@if($today == 14)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-14 00:00:00")
                                <?php $total_spending += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ $total_spending }}
                                </font>
                            </td>
                        </tr>
                        <tr bgcolor="#ffffff" valign=top>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;15</b></font> <font size="-1">@if($today == 15)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-15 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;16</b></font> <font size="-1">@if($today == 16)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-16 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;17</b></font> <font size="-1">@if($today == 17)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-17 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;18</b></font> <font size="-1">@if($today == 18)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-18 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;19</b></font> <font size="-1">@if($today == 19)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-19 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;20</b></font> <font size="-1">@if($today == 20)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-20 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;21</b></font> <font size="-1">@if($today == 21)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-21 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                        </tr>
                        <tr bgcolor="#ffffff" valign=top>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;22</b></font> <font size="-1">@if($today == 22)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-22 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;23</b></font> <font size="-1">@if($today == 23)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-23 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;24</b></font> <font size="-1">@if($today == 24)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-24 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;25</b></font> <font size="-1">@if($today == 25)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-25 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;26</b></font> <font size="-1">@if($today == 26)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-26 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;27</b></font> <font size="-1">@if($today == 27)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-27 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;28</b></font> <font size="-1">@if($today == 28)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-28 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                        </tr>
                        <tr bgcolor="#ffffff" valign=top>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;29</b></font> <font size="-1">@if($today == 29)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-29 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;30</b></font> <font size="-1">@if($today == 30)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-30 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;31</b></font> <font size="-1">@if($today == 31)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-31 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;</b></font> <font size="-1"></font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-011 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;</b></font> <font size="-1"></font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-011 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;</b></font> <font size="-1"></font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-011 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;</b></font> <font size="-1"></font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                @if($post->created_at == "2020-$month-011 00:00:00")
                                {{ $total_spending += $post->addmission_fee + $post->purchase_cost }}
                                @endif
                                @endforeach
                                </font>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
        <!-- スポット検索ここまで -->
        
        <!-- 右コンテンツ -->
        <div class="col-md-4">
            <!--  -->
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title personal-title">旅費等</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-dark">施設費　　：</li>
                        <li class="list-group-item text-dark">購入費　　：</li>
                    </ul>
                </div>
            </div>
            
            <!--  -->
            <div class="card" style="margin-top: 10px;">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title personal-title">変動費</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-dark">任意保険　：</li>
                        <li class="list-group-item text-dark">車検　　　：</li>
                        <li class="list-group-item text-dark">駐車場代　：</li>
                        <li class="list-group-item text-dark">消耗品費　：</li>
                        <li class="list-group-item text-dark">分割払い金：</li>
                    </ul>
                </div>
            </div>
            
            <!--  -->
            <div class="card" style="margin-top: 10px;">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title personal-title">固定費</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-dark">自賠責保険：</li>
                        <li class="list-group-item text-dark">重量税　　：</li>
                        <li class="list-group-item text-dark">自動車税　：</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- おすすめユーザーここまで -->
        
    </div>
</div>
@endsection
