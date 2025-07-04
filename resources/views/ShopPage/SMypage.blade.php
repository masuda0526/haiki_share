@extends('layouts.one_column_layout')
@section('title', '店舗ページ')

@section('main_content')
<div>
    <div class="p-smypage__main">
        <div class="p-smypage__img">
            <img src="{{$shop->imgUrl()}}" alt="">
        </div>
        <div class="p-smypage__explain">
            <h4 class="p-smypage__sname">{{$shop->s_name}}</h4>
            <h4 class="p-smypage__sstn">{{$shop->s_stn}}</h4>
            <p class="p-smypage__head">住所</p>
            <p class="p-smypage__text">{{$shop->s_adrs}}</p>
            <p class="p-smypage__head">店長</p>
            <p class="p-smypage__text">{{$shop->getBossFullName()}}</p>
            @if ($isEditShop)
            <div class="o-btnArea-right">
                <a class="o-btn__rad u-btn__mainColor" href="{{ route('editshop.index') }}">店舗情報編集</a>
            </div>
            @endif
        </div>
    </div>
    <div class="u-mb6">
        <div class="o-content-box">
            <h3 class="o-content-title">出品中の商品</h3>
            <a class="o-link" href="{{ route('slist.nowsale') }}">一覧へ ＞</a>
        </div>
        <div class="p-smypage__product">
            @if (count($products) > 0)
                <product-card-container
                    :products='@json($products)'
                    containeruse='smypage'
                ></product-card-container>
            @else
                出品した商品はありません。
            @endif
        </div>
        @if ($isEditProduct)
        <div class="o-btnArea-right p-smypage__product-btn">
            <a class="o-btn__rad u-btn__mainColor" href="{{ route('pregist.index') }}">商品を追加</a>
        </div>
        @endif
    </div>
    <div class="u-mb6">
        <div class="o-content-box">
            <h3 class="o-content-title">購入された商品</h3>
            <a class="o-link" href="{{ route('slist.sold') }}">一覧へ ＞</a>
        </div>
        <div class="p-smypage__product p-smypage__product-parchased">
            @if (!empty($parchaseProducts))
                <product-card-container
                :products='@json($parchaseProducts)'
                containeruse='smypage'
                ></product-card-container>
            @else
                購入された商品はありません。
            @endif
        </div>
    </div>
    <div class="u-mb6">
        <h3 class="o-content-title">スタッフ一覧</h3>
        <div class="p-smypage__staffbox">
            <div class="p-smypage__staff">
                <div class="p-smypage__row">
                    <div class="p-smypage__col">No.</div>
                    <div class="p-smypage__col3">従業員</div>
                    <div class="p-smypage__col6">メールアドレス</div>
                </div>
                @foreach ($staff as $s)
                <div class="p-smypage__row">
                    <div class="p-smypage__col"><a href="{{ route('editemployer.index', ['employerId'=>$s->e_id]) }}">{{$s->e_cd}}</a></div>
                    <div class="p-smypage__col3">{{$s->getFullName()}}</div>
                    <div class="p-smypage__col6">{{$s->email}}</div>
                </div>
                @endforeach
            </div>
            @if($isEditEmployer)
            <div class="o-btnArea-right p-smypage__staff-btn">
                <a class="o-btn__rad u-btn__mainColor" href="{{ route('addemployer.index') }}">従業員追加</a>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
