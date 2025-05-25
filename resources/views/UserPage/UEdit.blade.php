@extends('layouts.one_column_layout')

@section('titel', '利用者編集')

@section('main_content')

@include('layouts.error')
    <div class="l-form__w50">
        <form class="c-form" action="{{route('uedit.update')}}" method="post">
            @csrf
            <div class="c-form__formBox">
                <label for="u_sei">利用者名（姓）
                    <input type="text" name="u_sei" placeholder="山田" value="{{$user->u_sei}}">
                </label>
            </div>
            <div class="c-form__formBox">
                <label for="u_mei">利用者名（名）
                    <input type="text" name="u_mei" placeholder="太郎" value="{{$user->u_mei}}">
                </label>
            </div>
            <div class="c-form__formBox">
                <label for="email">メールアドレス
                    <input type="text" name="email" placeholder="example@xxx.com" value="{{ $user->email}}">
                </label>
            </div>
            <area-select-component
                :regions="{{$regions}}"
                :apiurl="'{{$apiurl}}'"
                :u_pref = "'{{$user->u_pref}}'"
                :r_id = "{{$r_id}}"
            ></area-select-component>
            <div class="c-form__formBox">
                <label for="address">住所
                    <input type="text" name="address"  value="{{$user->u_adrs}}">
                </label>
            </div>
            <p>パスワードを変更する場合は、以下に入力してください。</p>
            <div class="c-form__formBox">
                <label for="nowpass">現在のパスワード
                    <input type="password" name="nowpass" value="">
                </label>
            </div>
            <div class="c-form__formBox">
                <label for="newpass">新しいパスワード
                    <input type="password" name="newpass" value="">
                </label>
            </div>
            <div class="c-form__formBox">
                <label for="repass">パスワード確認用
                    <input type="password" name="repass" value="">
                </label>
            </div>
            <div class="c-form__btnBox--center">
                <button class="o-btn__rad u-btn__mainColor" type="submit">更新する</button>
            </div>
        </form>
    </div>

@endsection
