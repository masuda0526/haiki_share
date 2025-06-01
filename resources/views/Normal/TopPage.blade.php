@extends('layouts.one_column_layout')

@section('title', 'haiki share とは...')

@section('main_content')

<div class="p-top-container">
    <div class="p-top-box">
        <h3 class="o-content-title p-top-title__sub">haiki share について</h3>
        <p>コンビニ等から発生する食料品等の廃棄量は、１年間でおよそ２０〜３０万トンにも及ぶと言われています。</p>
        <p>１日あたりに換算すると、おにぎり２０個、お弁当５つが毎日廃棄されている計算です。</p>
        <p>廃棄するだけであれば、単純な話です。しかし、現実は廃棄するための費用がかかります。</p>
        <p>廃棄にかかる費用は、商品の１割程度と言われており、年間で450万円にものぼり、仕入れ費用に加えて廃棄用がかかると経営に与える影響は少なくありません。</p>
        <p>そこで、haiki share が問題解決に役立ちます！</p>
        <p>廃棄する商品を少しでも減らしたいコンビニ事業者と、安く購入したい利用者を結びつけることで、経営にマイナスの影響を与える廃棄費用を少しでもプラスに変えるサービス、それが haiki share です。</p>
    </div>

    <div class="p-top-box p-top-title__sub">
        <h3 class="o-content-title">コンビニ事業者のメリット</h3>
        <ul>
            <li>廃棄する商品を減らすことができる！</li>
            <li>廃棄にかかる費用が抑えられる！</li>
            <li>少しでも売り上げが増やすことができる！</li>
        </ul>
        <div class="o-btnArea-right">
            <a href="{{ route('ssignup.index') }}">新規登録して利用を開始する＞</a>
        </div>
        <div class="o-btnArea-right">
            <a href="{{ route('slogin.index') }}">事業者としてログインする＞</a>
        </div>
    </div>

    <div class="p-top-box p-top-title__sub">
        <h3 class="o-content-title">利用者のメリット</h3>
        <ul>
            <li>コンビニの商品が安く購入することができる！</li>
            <li>廃棄ロス削減に貢献できる！</li>
        </ul>
        <div class="o-btnArea-right">
            <a href="{{ route('usignup.index') }}">利用者として新規登録する＞</a>
        </div>
        <div class="o-btnArea-right">
            <a href="{{ route('ulogin.index') }}">利用者としてログインする＞</a>
        </div>
    </div>

    <div class="p-top-box">
        <p>ますは商品は見てみましょう！</p>
        <div class="o-btnArea-right">
            <a href="{{ route('list') }}">商品一覧へ＞</a>
        </div>
    </div>

</div>

@endsection
