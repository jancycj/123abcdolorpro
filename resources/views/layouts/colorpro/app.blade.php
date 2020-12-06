<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@logezy">
    <meta name="twitter:creator" content="@logezy">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Logezy">
    <meta name="twitter:description" content="Timesheets made simple">
    <meta name="twitter:image" content="">

    <!-- Facebook -->
    <meta property="og:url" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">

    <meta property="og:image" content="">
    <meta property="og:image:secure_url" content="">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Timesheets made simple">
    <meta name="author" content="Logezy">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('new_assets/assets/img/favicon.png') }}">

    <title>Logezy | Timesheet management made easy</title>

    <!-- vendor css -->
    <script src="{{asset('js/app.js')}}"></script>
    <link href="{{ asset('new_assets/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('new_assets/style.css') }}">
    <link href="{{ asset('new_assets/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new_assets/lib/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new_assets/lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new_assets/lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('new_assets/css/vue-select.css') }}" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="{{ asset('new_assets/css/sweetalert.css') }}">
   


    <!-- Logezy CSS -->
    <link rel="stylesheet" href="{{ asset('new_assets/assets/css/dashforge.css') }}">
    <link rel="stylesheet" href="{{ asset('new_assets/assets/css/dashforge.calendar.css') }}">


    <!-- <link rel="stylesheet" href="{{ asset('assets/css/skin.cool.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('new_assets/assets/css/skin.gradient1.css') }}">
    <!-- Fontawesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- select 2 -->
    <link href="{{ asset('new_assets/lib/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- Offline JS  -->
    <link href="{{ asset('new_assets/css/offline-theme-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('new_assets/css/offline-language-english.css') }}" rel="stylesheet">
    <link type="text/css" href="{{asset('new_assets/assets/css/dashforge.dashboard.css')}}">

   <!--  <script type="text/javascript">
      window.role ="{{ session('role') }}";
      window.pages = {!! json_encode(session('pages')) !!};
      window.permissions = {!! json_encode(session('allowed_routes')) !!};
    </script> -->


    @yield('style')
    <style type="text/css">
      html { overflow-y: scroll; }
      body{
    background-color:#e5e6f563;
      }
      .import-sec-white{
          background-color:#fff;
          padding:25px 15px;
          margin-top:10px
          
      }
      .import-sec-white h5{
          margin:0;
          padding-left:5px;
          padding-top:15px;
          padding-bottom:15px;
      }

      .days {
        /*background: rgba(147,206,222,1);
        background: -moz-linear-gradient(top, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(147,206,222,1)), color-stop(41%, rgba(117,189,209,1)), color-stop(100%, rgba(73,165,191,1)));
        background: -webkit-linear-gradient(top, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
        background: -o-linear-gradient(top, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
        background: -ms-linear-gradient(top, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
        background: linear-gradient(to bottom, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#93cede', endColorstr='#49a5bf', GradientType=0 );*/
        background: rgb(7, 89, 225);
        display: inline-block; 
        width: 14.3%; 
        text-align: center; 
        height: 32px; 
        vertical-align: middle; 
        line-height: 30px;
        color:#535151;
        font-size: bold;
        border-right: 1px solid #c9c9c9;
        border-bottom: 1px solid #dcd8d8;
        /*border-top: 1px solid #0168fa;*/
        /*background:#03A9F4;*/
        color: #fff;

      }

      .days_line {
        /*background: rgba(147,206,222,1);
        background: -moz-linear-gradient(top, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(147,206,222,1)), color-stop(41%, rgba(117,189,209,1)), color-stop(100%, rgba(73,165,191,1)));
        background: -webkit-linear-gradient(top, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
        background: -o-linear-gradient(top, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
        background: -ms-linear-gradient(top, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
        background: linear-gradient(to bottom, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#93cede', endColorstr='#49a5bf', GradientType=0 );*/
        background: rgb(7, 89, 225);
        display: inline-block; 
        width: 14.3%; 
        text-align: center; 
        height: 5px; 
        vertical-align: middle; 
        line-height: 30px;
        color:#535151;
        font-size: bold;
        border-right: 1px solid #c9c9c9;
        border-bottom: 1px solid #dcd8d8;
        /*border-top: 1px solid #0168fa;*/
        /*background:#03A9F4;*/
        color: #fff;

      }

      /* .today { background: #effaff; color:#2196F3; } */
      .today { background: #2196f3; color:#fff; }

      
      a svg { color: #0168fa; }
      html,body{
          height: 100%
      }

      .notice {
        width: 100%;
        /* background: #8BC34A; */
        /* position: relative; */
        color: #fff;
        padding: 15px 20px; 
        /* top: 58px;  */
        text-align: center;
        /* display: list-item; */
      }

      .modal-header { background-image: linear-gradient(to right, #015de1 0, #560bdf 75%); }
      .modal-header h6 { color: #fff; }
      /*.card-header { background: #e8f5fb; }*/

      .modal-backdrop { background-color: rgba(15, 21, 32, 0.19); }
      .modal-content { border-radius: 0.4rem }
      
      body {font-size: small; } 


      @import "bourbon";

      .alert-box {
        border-style: solid;
        border-width: 1px;
        display: block;
        width: 100%;
        font-weight: normal;
        margin-bottom: 1.25rem;
        position: absolute;
        top: 60px;
        padding: 0.875rem 1.5rem 0.875rem 0.875rem;
        font-size: 0.8125rem;
        background-color: #008cba;
        border-color: #0078a0;
        color: white;
        box-shadow: 0px 1px 5px 0 darkslategrey;
        z-index: -1;
      }
      .alert-box.success {
        background-color: #43ac6a;
        border-color: #3a945b;
        color: white;
        text-align: center;
        font-size: 20px;
      }
      
      .alert-box.warning {
        background-color: #FFC107;
        border-color: #cf8518;
        color: white;
        text-align: center;
        font-size: 20px;
      }

      .alert-box.info {
        background-color: #6eb9f4;
        border-color: #2196f3;
        color: white;
        text-align: center;
        font-size: 20px;
      }


      .alert-box.danger {
        background-color: #ff9371;
        border-color: #F44336;
        color: white;
        text-align: center;
        font-size: 20px;
      }
      .contact-content-sidebar {
          top: 10%;
      }
      .tab-content{
        margin-bottom: 50px;
      }

      .agency {
        border: 1px solid #e7e7e7;
        padding: 10px 20px;
      }
     .navbar-header .nav-link {
        /* color: rgb(255, 255, 255) !important; */
     }
     .logo-new {
            color: white;
            font-weight: 900;
            padding: 5px;
            padding-top: 15px;
        }
        .fade:not(.show) {
        opacity: 5;
    }
    .modal {
        top: 14px !important;
        padding: 15px !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:focus {
      background-color: #ffffff !important;
  }
  .dataTables_wrapper .dataTables_paginate .paginate_button {
      background-color: #ffffff !important;
      
  }
  .dataTables_wrapper .dataTables_paginate .paginate_button.previous {
      margin-right: 0px !important;
  }
  .dataTables_wrapper .dataTables_paginate .paginate_button {
      padding: 1px 4px !important;
      
  }
  @media (min-width: 1200px){
    .container {
        max-width: 1200px !important;
    }
  }
  .fade:not(.show) {
      opacity: 5;
  }
  select.form-control.form-control-sm {
        max-height: 24px !important;
        padding: 3px !important;
    }
  </style>
  @yield('style')
  </head>
  <body >
    <div id="app">
      @include('layouts.colorpro.header')
      @yield('content')
      @include('layouts.colorpro.footer')
    </div> <!-- /#app -->
    <script src="{{ asset('new_assets/js/offline.min.js')}}"></script>
    <script src="{{ asset('new_assets/lib/date.min.js') }}"></script>
    <script src="{{ asset('new_assets/js/local.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.15/lodash.core.min.js"></script>
    <script src="{{ asset('new_assets/js/sweetalert.js') }}"></script>
    <script src="{{ asset('new_assets/lib/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- <script src="{{ asset('new_assets/js/app.js') }}"></script> -->
    <script src="{{ asset('new_assets/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('new_assets/lib/jqueryui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('new_assets/lib/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('new_assets/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('new_assets/lib/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('new_assets/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('new_assets/lib/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('new_assets/lib/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('new_assets/lib/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('new_assets/assets/js/dashforge.aside.js') }}"></script>
    <!-- chart -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
    <!-- Google map api key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCxExDtVmUoKn1B18Vs0ULNKq0qu6hmsM&libraries=places"></script>
    <!-- select 2 -->
    <script type="text/javascript" src="{{ asset('new_assets/assets/js/dashforge.js') }}"></script>
    <script type="text/javascript">
      
      window.notify = function(msg, status) {
        if(! $('.alert-box').length) {
          switch(status) {

            case 'success':
              $('<div class="alert-box success">'+msg+'!</div>')
                .prependTo('body').delay(5000)
                .fadeOut(1000, function() {$('.alert-box').remove(); }); 
              break;

            case 'info':
              $('<div class="alert-box info">'+msg+'!</div>')
                .prependTo('body').delay(5000)
                .fadeOut(1000, function() {$('.alert-box').remove(); });
              break;

            case 'warning':
              $('<div class="alert-box warning">'+msg+'!</div>')
                .prependTo('body').delay(5000)
                .fadeOut(1000, function() {$('.alert-box').remove(); });
              break; 

            case 'danger':
               case 'info':
              $('<div class="alert-box danger">'+msg+'!</div>')
                .prependTo('body').delay(5000)
                .fadeOut(1000, function() {$('.alert-box').remove(); });
              break;

            default:
                $('<div class="alert-box success">'+msg+'!</div>')
                  .prependTo('body').delay(5000)
                  .fadeOut(1000, function() {$('.alert-box').remove(); });
                break;

          }
          
        }
      };
    </script>

    <script type="text/javascript">
      $('.dropdown').on('click', function() {
        $('[data-toggle=dropdown]').dropdown('toggle');
      });
      $('#dfSettingsShow').click(function() {
        $('.df-settings').toggleClass('show');
      });
      $('#acc_dropdown').click(function() {
        $('.acc_dropdown').toggleClass('show');
      });
      $('.dropdown-toggle').dropdown();
      $('.navbar-menu .with-sub .nav-link').on('click', function(e){
                e.preventDefault();
                $(this).parent().toggleClass('show');
                $(this).parent().siblings().removeClass('show');

                if(window.matchMedia('(max-width: 991px)').matches) {
                psNavbar.update();
                }
            })
    </script>
     <script type="text/javascript">
     
      $('.dropdown-toggle').dropdown();

    </script>

    @yield('script')
  </body>
</html>
