<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
   @include('layouts.header')

   @yield('appstyles')
</head>
<body >
    <div id="app">

    <!-- Left Panel -->

    @include('layouts.company.side_bar')
    <!-- Left Panel -->


    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('layouts.company.nav_bar')
        <!-- Header-->

        @yield('app')
    <div class="clearfix"></div>

    @include('layouts.footer')

</div><!-- /#right-panel -->

<!-- Right Panel -->
</div>

<!-- Scripts -->
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
@include('layouts.script')

<script src="{{asset('js/app.js')}}"></script>
@yield('appscripts')

</body>
</html>
