@extends('layouts.one_column_layout')

@section('title', '商品登録')

@section('main_content')

@include('layouts.error')
<div class="p-spregist__container">

    <form action="{{route('pedit.submit', ['productId'=>$product->p_id])}}" enctype="multipart/form-data" method="post">
        @csrf

        <div class="p-spregist__shopImg">
            <img-input :dburl='@json($product->p_img_url)'></img-input>
        </div>

        <div class="p-spregist__form">
            <div class="c-form">
                <div class="c-form__formBox">
                    <div class="c-form__formBox--half">
                        <label for="price">定価
                            <input type="number" name="price" value="{{ old('price', $product->price) }}">
                        </label>
                    </div>
                    <div class="c-form__formBox--half">
                        <label for="dis_price">割引価格
                            <input type="number" name="dis_price" value="{{ old('dis_price', $product->dis_price) }}">
                        </label>
                    </div>
                </div>
                <div class="c-form__formBox">
                    <label for="s_name">商品名
                        <input type="text" name="p_name" value="{{old('p_name', $product->p_name)}}">
                    </label>
                </div>
                <category-input
                :groups='@json($groups)'
                :apiurl="'{{ $apiUrl }}'"
                :db-group-num='{{ $dbGroupNum }}'
                :db-category-num='{{ $product->c_id }}'
                ></category-input>
                <div class="c-form__formBox">
                    <label for="ex_dt">賞味期限
                        <input type="date" name="ex_dt" value="{{old('ex_dt', $product->ex_dt)}}">
                    </label>
                </div>
                <div class="c-form__formBox">
                    <label for="p_comment">コメント
                        <input type="text" name="p_comment" value="{{old('p_comment', $product->p_comment)}}">
                    </label>
                </div>
                <div class="c-from__formBox">
                    <label for="p_status">商品の状況
                        <select name="p_status">
                            @foreach ($productStatus as $val => $status)
                                <option value="{{ $val }}">{{ $status }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
            </div>
        </div>
        <div class="o-btnArea-center">
            <input type="submit" class="o-btn__rad u-btn__mainColor" value="削除する" name="submit">
            <input type="submit" class="o-btn__rad u-btn__mainColor" value="更新する" name="submit">
        </div>

    </form>
</div>

@endsection
