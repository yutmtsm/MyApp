@extends('layouts.mypage')

@section('title', 'お金管理')

@section('content')
<div class="container">
    <h1>支出一覧{{ $calendar_day[5]->jDay}}</h1>
    <!-- スポット検索 -->
    <div class="row">
        
        <!-- 右コンテンツ -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-header d-flex">
                        <h4 class="card-title personal-title">年間支出：{{ number_format(12000) }}　</h4>
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
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[0]->jDay)
                                <?php $total_spending01 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending01) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[1]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[1]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[1]->jDay)
                                <?php $total_spending02 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending02) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[2]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[2]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[2]->jDay)
                                <?php $total_spending03 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending03) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[3]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[3]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[3]->jDay)
                                <?php $total_spending04 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending04) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[4]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[4]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[4]->jDay)
                                <?php $total_spending05 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending05) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[5]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[5]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[5]->jDay)
                                <?php $total_spending06 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending06) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[6]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[6]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[6]->jDay)
                                <?php $total_spending07 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending07) }}円
                                </font>
                            </td>
                        </tr>
                        <tr bgcolor="#ffffff" valign=top>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[7]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[7]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[7]->jDay)
                                <?php $total_spending08 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending08) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[8]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[8]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[8]->jDay)
                                <?php $total_spending09 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending09) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[9]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[9]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[9]->jDay)
                                <?php $total_spending10 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending10) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[10]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[10]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[10]->jDay)
                                <?php $total_spending11 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending11) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[11]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[11]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[11]->jDay)
                                <?php $total_spending12 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending12) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[12]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[12]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[12]->jDay)
                                <?php $total_spending13 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending13) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[13]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[13]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[13]->jDay)
                                <?php $total_spending14 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending14) }}円
                                </font>
                            </td>
                        </tr>
                        <tr bgcolor="#ffffff" valign=top>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[14]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[14]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[14]->jDay)
                                <?php $total_spending15 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending15) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[15]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[15]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[15]->jDay)
                                <?php $total_spending16 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending16) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[16]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[16]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[16]->jDay)
                                <?php $total_spending17 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending17) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[17]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[17]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[17]->jDay)
                                <?php $total_spending18 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending18) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[18]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[18]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[18]->jDay)
                                <?php $total_spending19 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending19) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[19]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[19]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[19]->jDay)
                                <?php $total_spending20 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending20) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[20]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[20]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[20]->jDay)
                                <?php $total_spending21 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending21) }}円
                                </font>
                            </td>
                        </tr>
                        <tr bgcolor="#ffffff" valign=top>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[21]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[21]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[21]->jDay)
                                <?php $total_spending22 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending22) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[22]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[22]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[22]->jDay)
                                <?php $total_spending23 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending23) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[23]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[23]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[23]->jDay)
                                <?php $total_spending24 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending24) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[24]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[24]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[24]->jDay)
                                <?php $total_spending25 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending25) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[25]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[25]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[25]->jDay)
                                <?php $total_spending26 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending26) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[26]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[26]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[26]->jDay)
                                <?php $total_spending27 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending27) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[27]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[27]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[27]->jDay)
                                <?php $total_spending28 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending28) }}円
                                </font>
                            </td>
                        </tr>
                        <tr bgcolor="#ffffff" valign=top>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[28]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[28]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[28]->jDay)
                                <?php $total_spending29 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending29) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[29]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[29]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[29]->jDay)
                                <?php $total_spending30 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending30) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[30]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[30]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[30]->jDay)
                                <?php $total_spending31 += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending31) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[31]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[31]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[31]->jDay)
                                <?php $total_spending += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[32]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[32]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[32]->jDay)
                                <?php $total_spending += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[33]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[33]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[33]->jDay)
                                <?php $total_spending += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending) }}円
                                </font>
                            </td>
                            <td height=90><font color="#000000"><font size="+1"><b>&nbsp;{{ $calendar_day[34]->jDay}}</b></font> <font size="-1">@if($today == $calendar_day[34]->jDay)<span style="color:red;"> 今日</span>@endif</font></font><br>
                                <font size="-1">
                                @foreach($posts as $post)
                                <?php $post_day = substr($post->created_at, 8, 2); ?>
                                @if($post_day == $calendar_day[34]->jDay)
                                <?php $total_spending += $post->addmission_fee + $post->purchase_cost ?>
                                @endif
                                @endforeach
                                {{ number_format($total_spending) }}円
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
