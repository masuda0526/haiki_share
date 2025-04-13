@include('layouts.head')
@include('layouts.header')

<div id="app">
    <h1 class="l-title">@yield('title')</h1>
    <div class="l-sub--twocolumn">
        @yield('sub_content')
    </div>
    <div class="l-main--oneColumn">
        @yield('main_content')
    </div>
</div>
