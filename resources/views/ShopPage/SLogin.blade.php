@extends('layouts.one_column_layout')
@section('title', 'ログイン(従業員)')
@section('main_content')
<div class="l-form__w50">
    @include('layouts.error')
    <form class="c-form" action="{{route('slogin.login')}}" method="post">
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
        <div class="c-form__btnBox--right"><a href="{{route('ssignup.signup')}}">新規登録 ＞</a></div>
        <div class="c-form__btnBox--right u-mb3"><a href="{{route('sremind.index')}}">パスワードを忘れた方 ＞</a></div>
        <div class="c-form__btnBox--center">
            <button class="o-btn__rad u-btn__mainColor" type="submit">ログイン</button>
        </div>
    </form>
</div>

@endsection
