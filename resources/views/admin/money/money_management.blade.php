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
                    <table border="0" cellspacing="1" cellpadding="1" bgcolor="#CCCCCC" style="font: 12px; color: #666666; width: 100%;">
                        <tr>
                            <td align="center" colspan="7" bgcolor="#EEEEEE" height="18" style="color: #666666;">2020年11月</td>
                        </tr>
                        
                        
                        <tr>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">1</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">2</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">3</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">4</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">5</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">6</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">7</td>
                        </tr>
                        <tr>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">8</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">9</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">10</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">11</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">12</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">13</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">14</td>
                        </tr>
                        <tr>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">15</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">16</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">17</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">18</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">19</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">20</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">21</td>
                        </tr>
                        <tr>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">22</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">23</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">24</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">25</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">26</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">27</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">28</td>
                        </tr>
                        <tr>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">29</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">30</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">31</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">　</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">　</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">　</td>
                            <td class="calendar-day moneypage" align="center" bgcolor="#FFFFFF" style="color: #666666;">　</td>
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
