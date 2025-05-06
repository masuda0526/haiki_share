@extends('layouts.one_column_layout')

@section('title', '新規登録')

@section('main_content')

@include('layouts.error')
<form action="{{route('ssignup.signup')}}" enctype="multipart/form-data" method="post">
    @csrf

    <div class="p-ssignup__shopImg">
        <img-input></img-input>
    </div>

    <div class="p-ssignup__form">
        <div class="p-ssignup__container--left c-form">
            <div class="c-form__formBox">
                <label for="s_name">コンビニ名
                    <input type="text" name="s_name" value="{{old('s_name')}}">
                </label>
            </div>
            <div class="c-form__formBox">
                <label for="s_stn">支店名
                    <input type="text" name="s_stn" value="{{old('s_stn')}}">
                </label>
            </div>
            <area-select-component
            :regions="{{$regions}}"
            :apiurl="'{{$apiurl}}'"
            ></area-select-component>
            <div class="c-form__formBox">
                <label for="s_adrs">住所
                    <input type="text" name="s_adrs" value="{{old('s_adrs')}}">
                </label>
            </div>
        </div>

        <div class="p-ssignup__container--right c-form">
            <div class="c-form__formBox">
                <div class="c-form__formBox--half">
                    <label for="e_seib">代表者名（姓）
                        <input type="text" name="e_seib" value="{{old('e_sei')}}">
                    </label>
                </div>
                <div class="c-form__formBox--half">
                    <label for="e_meib">代表者名（名）
                        <input type="text" name="e_meib" value="{{old('e_mei')}}">
                    </label>
                </div>
            </div>
            <div class="c-form__formBox">
                <label for="email">メールアドレス
                    <input type="text" name="email" value="{{old('email')}}">
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
        </div>
    </div>
    <div class="o-btnArea-center">
        <button href="" class="o-btn__rad u-btn__mainColor" type="submit">新規登録</button>
    </div>

</form>

@endsection
