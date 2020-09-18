@extends('layouts.index')

@section('title', '投稿編集')

@section('content')
<div class="container">
    <h1>新規投稿</h1>
    <div class="row" style="width: 100%;">
        <div class="col-md-6 mx-auto" >
            <form action="{{ action('Admin\PostController@update') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <!-- タイトル -->
                <div class="form-group">
                    <label class="control-label">タイトル</label>
                    <input type="text" class="form-control" name="title" value="{{ $post_form->title }}">
                </div>
                <!-- スポット -->
                <div class="form-group">
                    <label class="control-label">スポット</label>
                    <select name="spot" class="form-control">
                        <option value="pref" selected>{{ $post_form->pref }}</option>
                        <option value="北海道">北海道</option>
                        <option value="青森県">青森県</option>
                        <option value="岩手県">岩手県</option>
                        <option value="宮城県">宮城県</option>
                        <option value="秋田県">秋田県</option>
                        <option value="山形県">山形県</option>
                        <option value="福島県">福島県</option>
                        <option value="茨城県">茨城県</option>
                        <option value="栃木県">栃木県</option>
                        <option value="群馬県">群馬県</option>
                        <option value="埼玉県">埼玉県</option>
                        <option value="千葉県">千葉県</option>
                        <option value="東京都">東京都</option>
                        <option value="神奈川県">神奈川県</option>
                        <option value="新潟県">新潟県</option>
                        <option value="富山県">富山県</option>
                        <option value="石川県">石川県</option>
                        <option value="福井県">福井県</option>
                        <option value="山梨県">山梨県</option>
                        <option value="長野県">長野県</option>
                        <option value="岐阜県">岐阜県</option>
                        <option value="静岡県">静岡県</option>
                        <option value="愛知県">愛知県</option>
                        <option value="三重県">三重県</option>
                        <option value="滋賀県">滋賀県</option>
                        <option value="京都府">京都府</option>
                        <option value="大阪府">大阪府</option>
                        <option value="兵庫県">兵庫県</option>
                        <option value="奈良県">奈良県</option>
                        <option value="和歌山県">和歌山県</option>
                        <option value="鳥取県">鳥取県</option>
                        <option value="島根県">島根県</option>
                        <option value="岡山県">岡山県</option>
                        <option value="広島県">広島県</option>
                        <option value="山口県">山口県</option>
                        <option value="徳島県">徳島県</option>
                        <option value="香川県">香川県</option>
                        <option value="愛媛県">愛媛県</option>
                        <option value="高知県">高知県</option>
                        <option value="福岡県">福岡県</option>
                        <option value="佐賀県">佐賀県</option>
                        <option value="長崎県">長崎県</option>
                        <option value="熊本県">熊本県</option>
                        <option value="大分県">大分県</option>
                        <option value="宮崎県">宮崎県</option>
                        <option value="鹿児島県">鹿児島県</option>
                        <option value="沖縄県">沖縄県</option>
                    </select>
                    <input type="text" class="form-control mt-1" name="spot" value="{{ $post_form->spot }}">
                </div>
                <!-- 使用金 -->
                <div class="d-flex align-items-center">
                    <div class="form-group">
                        <label class="control-label">施設費</label>
                        <input type="text" class="form-control" name="addmission_fee" value="{{ $post_form->addmission_fee }}">
                    </div>
                    <div class="form-group" style="margin-left: 100px;">
                        <label class="control-label">購入金</label>
                        <input type="text" class="form-control" name="purchase_cost" value="{{ $post_form->purchase_cost }}">
                    </div>
                </div>
                <!-- コメント -->
                <div class="form-group">
                    <label class="control-label">コメント</label>
                    <textarea class="form-control" name="comment" value="{{ $post_form->comment }}" style="height: 150px;">{{ $post_form->comment }}</textarea>
                </div>
                <!-- 画像 -->
                <div class="form-group">
                    <label class="control-label">画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image">
                        <div class="form-text text-info">
                                設定中: {{ $post_form->image_path }}
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                            </label>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="{{ $post_form->id }}">
                {{ csrf_field() }}
                <input type="submit" class="btn-primary add-btn" value="更新">
            </form>
        </div>
    </div>
</div>
@endsection
