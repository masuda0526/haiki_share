@extends('layouts.two_column_layout')

@section('title',$title)

@section('sub_content')
<div>
    <search-box-component
    :issalebox='false'
    ></search-box-component>
</div>
@endsection

@section('main_content')
    <div>
        <h3 class="l-title__sub">{{ $subtitle }}</h3>
        <product-list-slist :products='@json($products)'/>
    </div>
@endsection
