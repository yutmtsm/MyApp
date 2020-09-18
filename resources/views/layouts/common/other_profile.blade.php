            <div class="col-md-4">
                <div class="section">
                    <div class="card">
                        @if(isset($other_user->image_path))
                        <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/user/{{ $other_user->image_path }}">
                        @else
                        <img width="100%" height="300px" style="margin-bottom: 5px;" src="/storage/image/noimage.png">
                        @endif
                        <div class="content d-flex">
                            <a href="{{ action('MoneybikeController@other_followers') }}" class="">フォロー数：{{ $following_Count }}</a>
                            <a href="{{ action('MoneybikeController@other_followers') }}" class="">フォロワー数：{{ $followed_Count }}</a>
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
                                <a href="#" class="add-bike" href="#">バイク追加</a>
                                <a class="add-bike" href="#">バイク編集</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>