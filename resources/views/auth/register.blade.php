@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color: black;">{{ __('messages.Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
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
                            <label for="address" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ __('messages.address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- プロフィール画像 -->
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ __('messages.profile-image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- 新規登録ボタン -->
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
