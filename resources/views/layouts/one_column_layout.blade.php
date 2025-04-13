@include('layouts.head')
@include('layouts.header')

<h1 class="l-title">@yield('title')</h1>
<div class="l-main--oneColumn">
    <div id="app">
        @yield('main_content')
    </div>
</div>

