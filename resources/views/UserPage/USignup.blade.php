@extends('layouts.one_column_layout')
@section('title', '利用者登録')
@section('main_content')

<div class="l-form__w50">
    @include('layouts.error')
    <form class="c-form" action="{{route('usignup.signup')}}" method="post">
        @csrf
        <div class="c-form__formBox">
            <label for="u_sei">利用者名（姓）
                <input type="text" name="u_sei" placeholder="山田" value="{{old('u_sei')}}">
            </label>
        </div>
        <div class="c-form__formBox">
            <label for="u_mei">利用者名（名）
                <input type="text" name="u_mei" placeholder="太郎" value="{{old('u_mei')}}">
            </label>
        </div>
        <div class="c-form__formBox">
            <label for="email">メールアドレス
                <input type="text" name="email" placeholder="example@xxx.com" value="{{old('email')}}">
            </label>
        </div>
        <div class="c-form__formBox">
            <label for="password">パスワード
                <input type="password" name="password" value="{{old('password')}}">
            </label>
        </div>
        <div class="c-form__formBox">
            <label for="repass">パスワード（確認用）
                <input type="password" name="repass" value="{{old('repass')}}">
            </label>
        </div>
        <area-select-component
            :regions="{{$regions}}"
            :apiurl="'{{$apiurl}}'"
            ></area-select-component>
        <div class="c-form__formBox">
            <label for="address">住所
                <input type="text" name="address"  value="{{old('address')}}">
            </label>
        </div>
        <div class="c-form__btnBox--right"><a href="{{route('ulogin.login')}}">ログイン ＞</a></div>
        <div class="c-form__btnBox--center">
            <button class="o-btn__rad u-btn__mainColor" type="submit">新規登録</button>
        </div>
    </form>
</div>

@endsection
