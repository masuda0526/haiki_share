@extends('layouts.one_column_layout')

@section('title', '従業員編集')

@section('main_content')

<div class="p-saddemployer">

    @include('layouts.error')

    <form action="{{ route('editemployer.edit') }}" method="post">
        @csrf
        <input type="hidden" name="employerId" value="{{ $target->e_id }}">
        <div class="c-form">
            <div class="c-form__formBox">

                <div class="c-form__formBox--half">
                    <label for="e_sei">従業員（姓）
                        <input type="text" name="e_sei" value="{{ old('e_sei', $target->e_sei) }}">
                    </label>
                </div>
                <div class="c-form__formBox--half">
                    <label for="e_mei">従業員（名）
                        <input type="text" name="e_mei" value="{{ old('e_mei', $target->e_mei) }}">
                    </label>
                </div>
            </div>
            <div class="c-form__formBox">
                <label for="email">メールアドレス
                    <input type="text" name="email" value="{{ old('email', $target->email) }}">
                </label>
            </div>
            <div class="c-form__formBox--check">
                <div class="c-check__header">
                    <label for="auth">権限付与</label>
                </div>
                <div class="c-check__body">
                    @foreach ($auths as $key=>$val)
                    <div>
                        <input type="checkbox" name="auth[]" value="{{ $key }}"
                        @if (in_array($key, $authArray))
                            checked
                        @endif>
                        {{ $val }}
                    </div>
                    @endforeach
                </div>
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
        </div>
        <div class="o-btnArea-center">
            <button href="" class="o-btn__rad u-btn__mainColor" type="submit">編集完了</button>
        </div>
    </form>

</div>

@endsection
