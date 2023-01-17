@include('layouts.header')
@include('layouts.side-nav')

<div class="all-content-wrapper">
@include('layouts.topnav')
      
@yield('content')

@include('layouts.footer')