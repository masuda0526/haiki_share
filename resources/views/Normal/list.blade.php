@extends('layouts.two_column_layout')

@section('title', '商品一覧')

@section('sub_content')
    <form action="{{route('list')}}" method="GET">
            {{--  --}}
            <div class="c-search">
            <div class="c-search-section">
                <h4>商品を検索</h4>
                <div class="c-search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="keyword" id="searchText" value="{{request('keyword')}}">
                </div>
            </div>
            <div class="c-search-section">
                <h4>価格</h4>
                <input type="number" name="minPrice" value="{{ request('minPrice') }}">
                 -
                <input type="number" name="maxPrice" value="{{ request('maxPrice') }}">
            </div>
            <div class="c-search-section">
                <h4>都道府県</h4>
                <select name="pref">
                    <option value="0">未選択</option>
                    @foreach ($prefs as $pref)
                    <option
                    value="{{ $pref->pref_id }}"
                    {{ $pref->pref_id==request('pref')?'selected':'' }}>{{ $pref->pref_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="c-search-section">
                <div>
                    <input type="checkbox" name="isSale" value="{{ $isSaleVal }}" {{ (!is_null(request('isSale')))?'checked':'' }}>販売中
                </div>
                <div>
                    <input type="checkbox" name="inExDt" value="inExDt" {{ (!empty(request('inExDt'))?'checked':'') }}>賞味期限以内
                </div>
            </div>
            <div class="o-btnArea-center">
                <input class="o-btn__rad--s u-btn__mainColor" type="submit" value="検索する">
            </div>
        </div>
        @if (isset($groups))
            <div class="c-group">
                <h4>分類で絞り込み</h4>
                <ul>
                    @foreach ($groups as $group)
                        <h5>{{$group->g_name}}</h5>
                        @foreach ($group->category as $category)
                            <li class="c-group-item">
                                <input type="checkbox"
                                    name="category[]"
                                    value="{{ $category->c_id }}"
                                    {{ in_array($category->c_id, request()->input('category', [])) ? 'checked' : '' }}>
                                {{ $category->c_name }}
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
        @endif

    </form>
@endsection

@section('main_content')
    <product-card-container :products='@json($products->items())'></product-card-container>
    {{ $products->links('vendor.pagination.custom') }}

@endsection
