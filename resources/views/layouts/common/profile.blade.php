<div class="col-md-4">
                <div class="section">
                    <div class="card">
                        <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/user/{{ $user->image_path }}">
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
                                    <img class="bike-icon" src="storage/image/bike/{{ $mybike->image_path }}">
                                    <p class="bike-text"><p>{{ $mybike->manufacturer }}</p></p>
                                    <p class="bike-text">『{{ $mybike->type }}』( {{ $mybike->engine_displacement }} )</p>
                                    
                                    <!-- Modalの詳細ボタン -->
                                    <button type="button" class="bike-detail-btn btn w-10 h-25" style="padding: 0;" data-toggle="modal" data-target="#exampleModal3">
                                        <p>詳細</p>
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
                                                    <img class="bike-detail-icon w-50 h-auto" src="storage/image/bike{{ $mybike->image_path }}">
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