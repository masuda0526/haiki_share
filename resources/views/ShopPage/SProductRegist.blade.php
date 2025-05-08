@extends('layouts.one_column_layout')

@section('title', '商品登録')

@section('main_content')

@include('layouts.error')
<div class="p-spregist__container">

    <form action="{{route('editshop.update')}}" enctype="multipart/form-data" method="post">
        @csrf

        <div class="p-spregist__shopImg">
            <img-input></img-input>
        </div>

        <div class="p-spregist__form">
            <div class="c-form">
                <div class="c-form__formBox">
                    <div class="c-form__formBox--half">
                        <label for="price">定価
                            <input type="number" name="price" value="{{ old('price') }}">
                        </label>
                    </div>
                    <div class="c-form__formBox--half">
                        <label for="dis_price">割引価格
                            <input type="number" name="dis_price" value="{{ old('dis_price') }}">
                        </label>
                    </div>
                </div>
                <div class="c-form__formBox">
                    <label for="s_name">商品名
                        <input type="text" name="p_name" value="{{old('p_name')}}">
                    </label>
                </div>
                <category-input
                :groups=@json($groups)
                :apiurl="'{{ $apiUrl }}'"></category-input>
                <div class="c-form__formBox">
                    <label for="s_adrs">賞味期限
                        <input type="date" name="s_adrs" value="{{old('ex_dt')}}">
                    </label>
                </div>
                <div class="c-form__formBox">
                    <label for="s_adrs">コメント
                        <input type="text" name="s_adrs" value="{{old('p_comment')}}">
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
