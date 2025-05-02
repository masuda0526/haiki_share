@extends('layouts.two_column_layout')
@section('title', 'マイページ')
@section('sub_content')
    <div class="c-sidebar">
        <h3 class="c-sidebar__title">{{$user->getFullName()}}</h3>
        <div class="c-sidebar__content">
            <h4 class="c-sidebar__subtitle">地域</h4>
            <p class="c-sidebar__text">{{$user->pref->pref_name}}</p>
        </div>
        <div class="c-sidebar__content">
            <h4 class="c-sidebar__subtitle">メールアドレス</h4>
            <p class="c-sidebar__text">{{$user->email}}</p>
        </div>
        <div class="c-form__btnBox--center">
            <a href="{{route('uedit.index')}}" class="o-btn__rad u-btn__mainColor">編集する</a>
        </div>

    </div>
@endsection

@section('main_content')
    <div>
        <h3 class="l-title__sub">購入した商品</h3>
        <product-list-land :products='@json($products)'/>
    </div>
@endsection
