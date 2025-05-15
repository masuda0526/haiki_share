@php
    $authValue = old('auth', []);
@endphp

@extends('layouts.one_column_layout')

@section('title', '従業員登録')

@section('main_content')

<div class="p-saddemployer">

    @include('layouts.error')

    <form action="{{ route('addemployer.add') }}" method="post">
        @csrf
        <div class="c-form">
            <div class="c-form__formBox">

                <div class="c-form__formBox--half">
                    <label for="e_sei">従業員（姓）
                        <input type="text" name="e_sei" value="">
                    </label>
                </div>
                <div class="c-form__formBox--half">
                    <label for="e_mei">従業員（名）
                        <input type="text" name="e_mei" value="">
                    </label>
                </div>
            </div>
            <div class="c-form__formBox">
                <label for="email">メールアドレス
                    <input type="text" name="email" value="">
                </label>
            </div>
            <div class="c-form__formBox">
                <label for="password">パスワード
                    <input type="password" name="password" value="">
                </label>
            </div>
            <div class="c-form__formBox">
                <label for="repass">パスワード確認用
                    <input type="password" name="repass" value="">
                </label>
            </div>
            <div class="c-form__formBox--check">
                <div class="c-check__header">
                    <label for="auth">権限付与</label>
                </div>
                <div class="c-check__body">
                    @foreach ($auths as $key=>$val)
                    <div>
                        <input type="checkbox" name="auth[]" value="{{ $key }}" @checked(in_array($key, $authValue))>{{ $val }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="o-btnArea-center">
            <button href="" class="o-btn__rad u-btn__mainColor" type="submit">追加する</button>
        </div>
    </form>

</div>

@endsection
