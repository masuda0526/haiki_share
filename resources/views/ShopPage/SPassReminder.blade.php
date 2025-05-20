@extends('layouts.one_column_layout')

@section('title', 'パスワード変更（従業員）')

@section('main_content')
<div class="p-sremind">
    @include('layouts.error')
    <form class="c-form" action="{{route('sremind.change')}}" method="post">
        @csrf
        <div class="c-form__formBox">
            <label for="email">メールアドレス
                <input type="text" name="email" id="" placeholder="example@xxx.com" value="{{old('email')}}">
            </label>
        </div>
        <div class="p-sremind__msg">
            <p>登録したパスワードを入力してください。</p>
            <p>新しいパスワードをメールで通知します。</p>
        </div>
        <div class="c-form__btnBox--center">
            <button class="o-btn__rad u-btn__mainColor" type="submit">パスワード変更</button>
        </div>
    </form>
</div>

@endsection
