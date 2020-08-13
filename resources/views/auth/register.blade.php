@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color: black;">{{ __('messages.Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <!-- E-mail&Password -->
                        <h3 class="circle" style="font-size: 20px; color: black;">{{ __('messages.E-mail&Password') }}</h3>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ __('messages.E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ __('messages.Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ __('messages.Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <!-- PersonalData-->
                        <h3 class="circle" style="font-size: 20px; color: black;">{{ __('messages.PersonalData') }}</h3>
                        
                        <!-- 名前 -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ __('messages.Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- 性別 -->
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ __('messages.gender') }}</label>

                            <div class="col-md-6 control-label">
                                <div class="btn-group" data-toggle="buttons" style="width: 100%">
                                    <label class="btn btn-primary">
                                        <input type="radio" autocomplete="off" name="gender" value="男性"
                                        @if (old('gender') === '男性') checked @endif>
                                        男性
                                    </label>
                                    <label class="btn btn-danger">
                                        <input type="radio" autocomplete="off" name="gender" value="女性"
                                        @if (old('gender') === '女性') checked @endif>
                                        女性
                                    </label>
                                    <label class="btn btn-success">
                                        <input type="radio" autocomplete="off" name="gender" value="その他"
                                        @if (old('gender') === 'その他') checked @endif>
                                        その他
                                    </label>
                                </div>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- 年齢 -->
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ __('messages.age') }}</label>

                            <div class="col-md-6">
                                <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- 出身地 -->
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ __('messages.Residence') }}</label>

                            <div class="col-md-6">
                                $residence = array('北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県', '新潟県','富山県','石川県','福井県', '茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県');
                                @foreach($residence as $resi)
                                <li>$pre</li>
                                @endforeach
                                <input id="residence" type="text" class="form-control @error('residence') is-invalid @enderror" name="residence" value="{{ old('residence') }}" required autocomplete="residence" autofocus>

                                @error('residence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"  style="color: black;">
                                    {{ __('messages.Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
