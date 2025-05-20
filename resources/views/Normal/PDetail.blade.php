@extends('layouts.one_column_layout')

@section('title', '商品詳細')

@section('main_content')

<div class="p-pdetail__content">
    <div class="p-pdetail__img">
        <img src="{{ $product->p_img_url }}" alt="">
    </div>
    <div>
        <div class="p-pdetail__info">
            <h3 class="p-pdetail__productName">{{ $product->p_name }}</h3>
            <p class="p-pdetail__text"><span class="p-pdetail__disprice">￥{{ $product->dis_price }}</span><span class="p-pdetail__text"> ← ￥{{ $product->price }}</span></p>
            <p class="p-pdetail__text">分類・カテゴリ：{{ $product->getCategoryAndGroupName() }}</p>
            <p class="p-pdetail__text">出品者：{{ $shop->s_name }}　{{ $shop->s_stn }}</p>
            <p class="p-pdetail__text">販売地域：{{ $shop->getPrefName() }}</p>
            @if (!empty($product->p_comment))
            <div class="p-pdetail__text">
                <p>コメント</p>
                <p>{{ $product->p_comment }}</p>
            </div>
            @endif
        </div>
        <div class="o-btnArea-right">
            <a class="o-share__btn" href="{{ $xurl }}">シェア</a>
            @if($isShowEditBtn)
                <a href="{{ route('pedit.index', ['productId' => $product->p_id]) }}" class="o-btn__rad u-btn__mainColor">編集する</a>
            @endif
            @if ($isShowBuyBtn)
                <a href="{{ route('pdetail.buy', ['productId' => $product->p_id]) }}" class="o-btn__rad u-btn__mainColor">購入する</a>
            @endif
        </div>
    </div>
</div>

@endsection
