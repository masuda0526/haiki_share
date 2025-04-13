@extends('layouts.one_column_layout')
@section('title', 'ログイン')
@section('main_content')
<div class="l-form__w50">
    @include('layouts.error')
    <form class="c-form" action="{{route('ulogin.login')}}" method="post">
        @csrf
        <div class="c-form__formBox">
            <label for="email">メールアドレス
                <input type="text" name="email" id="" placeholder="example@xxx.com" value="{{old('email')}}">
            </label>
        </div>
        <div class="c-form__formBox">
            <label for="password">パスワード
                <input type="password" name="password" id="">
            </label>
        </div>
        <div class="c-form__btnBox--right"><a href="{{route('usignup.index')}}">新規登録 ＞</a></div>
        <div class="c-form__btnBox--center">
            <button class="o-btn__rad u-btn__mainColor" type="submit">ログイン</button>
        </div>
    </form>
</div>

@endsection
