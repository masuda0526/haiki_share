@extends('layouts.one_column_layout')

@section('title', '店舗編集')

@section('main_content')

@include('layouts.error')
<div class="p-editShop__container">

    <form action="{{route('editshop.update')}}" enctype="multipart/form-data" method="post">
        @csrf

        <div class="p-editShop__shopImg">
            <img-input :dburl='@json($shop->imgUrl())'></img-input>
        </div>

        <div class="p-editShop__form">
            <div class="c-form">
                <div class="c-form__formBox">
                    <label for="s_name">コンビニ名
                        <input type="text" name="s_name" value="{{old('s_name', $shop->s_name)}}">
                    </label>
                </div>
                <div class="c-form__formBox">
                    <label for="s_stn">支店名
                        <input type="text" name="s_stn" value="{{old('s_stn', $shop->s_stn)}}">
                    </label>
                </div>
                <area-select-component
                :regions="{{$regions}}"
                :apiurl="'{{$apiurl}}'"
                :r_id="{{ $r_id }}"
                :u_pref="'{{ $shop->s_pref }}'"
                ></area-select-component>
                <div class="c-form__formBox">
                    <label for="s_adrs">住所
                        <input type="text" name="s_adrs" value="{{old('s_adrs', $shop->s_adrs)}}">
                    </label>
                </div>
            </div>
        </div>
        <div class="o-btnArea-center">
            <button href="" class="o-btn__rad u-btn__mainColor" type="submit">更新する</button>
        </div>

    </form>
</div>

@endsection
