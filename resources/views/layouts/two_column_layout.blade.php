@include('layouts.head')
@include('layouts.header')
<h1 class="l-title">@yield('title')</h1>
<div class="l-content__two">
    <div class="l-sub__twoColumn test">
        @yield('sub_content')
    </div>
    <div class="l-main--twoColumn test">
        @yield('main_content')
    </div>
</div>
