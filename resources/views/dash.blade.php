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
        color: rgb(255, 255, 255) !important;
     }
     .logo-new {
            color: white;
            font-weight: 900;
            padding: 5px;
            padding-top: 15px;
        }
  </style>
  </head>
  <body >
    <div id="app">
    <header class="navbar navbar-header navbar-header-fixed">
       <a href="" id="mainMenuOpen" class="burger-menu">
         <i class="fa fa-bars" aria-hidden="true"></i>
       </a>
        <a href="" id="mainMenuOpen" class="burger-menu d-none"><i data-feather="menu"></i></a>
        <div class="navbar-brand">
          <!-- <a href="/" class="df-logo">Log<span>ezy</span></a> -->
          <a href="#"><h2 class="logo-new ">Color-Pro</h2></a>
          
          @if(Session::has('agencies'))
           <ul class="nav navbar-menu ">
            <!-- <navigation-bar></navigation-bar> -->
            <li class="nav-item with-sub">
              <a href="" class="nav-link"> <i data-feather="package"></i></a>
              <ul class="navbar-menu-sub">
                @foreach(\Session::get('agencies') as $agency)
                <li class="nav-sub-item agency">
                  <a href="#" ><i data-feather="calendar"></i>{{ $agency->name }}</a>
                </li>
                @endforeach
                <li class="nav-sub-item">
                  <a href=""><i data-feather="plus"></i>Add Agency</a>
                </li>
              </ul>
            </li>
          </ul>
          @endif
        </div>
        <div id="navbarMenu" class="navbar-menu-wrapper">
            <div class="navbar-menu-header">
              <a href="http://themepixels.me/dashforge/index.html" class="df-logo">dash<span>forge</span></a>
              <a id="mainMenuClose" href="#"><i data-feather="x"></i></a>
            </div><!-- navbar-menu-header -->
            <ul class="nav navbar-menu">
              <li class="nav-label pd-l-20 pd-lg-l-25 d-lg-none">Main Navigation</li>
              <li class="nav-item with-sub active">
                <a href="#" class="nav-link"><i data-feather="pie-chart"></i> Dashboard</a>
              </li>
              <li class="nav-item with-sub">
                <a href="#" class="nav-link"><i data-feather="package"></i> Catelog</a>
                <ul class="navbar-menu-sub">
                  <li class="nav-sub-item"><a href="app-calendar.html" class="nav-sub-link"><i data-feather="calendar"></i>Calendar</a></li>
                  <li class="nav-sub-item"><a href="app-chat.html" class="nav-sub-link"><i data-feather="message-square"></i>Chat</a></li>
                  <li class="nav-sub-item"><a href="app-contacts.html" class="nav-sub-link"><i data-feather="users"></i>Contacts</a></li>
                  <li class="nav-sub-item"><a href="app-file-manager.html" class="nav-sub-link"><i data-feather="file-text"></i>File Manager</a></li>
                  <li class="nav-sub-item"><a href="app-mail.html" class="nav-sub-link"><i data-feather="mail"></i>Mail</a></li>
                </ul>
              </li>
              <li class="nav-item with-sub">
                <a href="#" class="nav-link"><i data-feather="package"></i> Order</a>
                <ul class="navbar-menu-sub">
                  <li class="nav-sub-item"><a href="app-calendar.html" class="nav-sub-link"><i data-feather="calendar"></i>Calendar</a></li>
                  <li class="nav-sub-item"><a href="app-chat.html" class="nav-sub-link"><i data-feather="message-square"></i>Chat</a></li>
                  <li class="nav-sub-item"><a href="app-contacts.html" class="nav-sub-link"><i data-feather="users"></i>Contacts</a></li>
                  <li class="nav-sub-item"><a href="app-file-manager.html" class="nav-sub-link"><i data-feather="file-text"></i>File Manager</a></li>
                  <li class="nav-sub-item"><a href="app-mail.html" class="nav-sub-link"><i data-feather="mail"></i>Mail</a></li>
                </ul>
              </li>
              <li class="nav-item"><a href="http://themepixels.me/dashforge/components/" class="nav-link"><i data-feather="box"></i> Customers</a></li>
              <li class="nav-item"><a href="http://themepixels.me/dashforge/collections/" class="nav-link"><i data-feather="archive"></i> reports</a></li>
            </ul>
          </div><!-- navbar-menu-wrapper -->
        <div class="navbar-right">
          <div class="dropdown dropdown-message">
            <!-- <a href="/v1/settings"><i class="fa fa-cog" aria-hidden="true" style=" font-size: 20px; color: white; margin-right: 5px;"></i></a> -->
            <!-- <a href="" class="dropdown-link new-indicator" data-toggle="dropdown">
              <i data-feather="message-square"></i>
              <span>5</span>
            </a> -->
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-header">New Messages</div>
              <a href="" class="dropdown-item">
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/350" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <strong>Socrates Itumay</strong>
                    <p>nam libero tempore cum so...</p>
                    <span>Mar 15 12:32pm</span>
                  </div><!-- media-body -->
                </div><!-- media -->
              </a>
              <a href="" class="dropdown-item">
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <strong>Joyce Chua</strong>
                    <p>on the other hand we denounce...</p>
                    <span>Mar 13 04:16am</span>
                  </div><!-- media-body -->
                </div><!-- media -->
              </a>
              <a href="" class="dropdown-item">
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/600" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <strong>Althea Cabardo</strong>
                    <p>is there anyone who loves...</p>
                    <span>Mar 13 02:56am</span>
                  </div><!-- media-body -->
                </div><!-- media -->
              </a>
              <a href="" class="dropdown-item">
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <strong>Adrian Monino</strong>
                    <p>duis aute irure dolor in repre...</p>
                    <span>Mar 12 10:40pm</span>
                  </div><!-- media-body -->
                </div><!-- media -->
              </a>
              <div class="dropdown-footer"><a href="">View all Messages</a></div>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
          <div class="dropdown dropdown-notification">
            <!-- <a href="" class="dropdown-link new-indicator" data-toggle="dropdown">
              <i data-feather="bell"></i>
              <span>2</span>
            </a> -->
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-header">Notifications</div>
              <a href="" class="dropdown-item">
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/350" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                    <span>Mar 15 12:32pm</span>
                  </div><!-- media-body -->
                </div><!-- media -->
              </a>
              <a href="" class="dropdown-item">
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <p><strong>Joyce Chua</strong> just created a new blog post</p>
                    <span>Mar 13 04:16am</span>
                  </div><!-- media-body -->
                </div><!-- media -->
              </a>
              <a href="" class="dropdown-item">
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/600" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <p><strong>Althea Cabardo</strong> just created a new blog post</p>
                    <span>Mar 13 02:56am</span>
                  </div><!-- media-body -->
                </div><!-- media -->
              </a>
              <a href="" class="dropdown-item">
                <div class="media">
                  <div class="avatar avatar-sm avatar-online"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                  <div class="media-body mg-l-15">
                    <p><strong>Adrian Monino</strong> added new comment on your photo</p>
                    <span>Mar 12 10:40pm</span>
                  </div><!-- media-body -->
                </div><!-- media -->
              </a>
              <div class="dropdown-footer"><a href="">View all Notifications</a></div>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
          <div class="dropdown dropdown-profile">
            <a href="" class="dropdown-link" data-toggle="dropdown" data-display="static" id="acc_dropdown">
              <div class="avatar avatar-sm"><img src="https://ui-avatars.com/api/?background=03a9f4&name=sajeer&rounded=true&color=aee4fd" class="rounded-circle" alt=""></div>
            </a><!-- dropdown-link -->
            <div class="dropdown-menu dropdown-menu-right acc_dropdown">
              <div class="avatar avatar-lg mg-b-15"><img src="https://ui-avatars.com/api/?background=03a9f4&name=sajeer&rounded=true&color=aee4fd" class="rounded-circle" alt=""></div>
              <h6 class="tx-semibold mg-b-5">sajeer</h6>
              <p class="mg-b-25 tx-12 tx-color-03">Administrator</p>
              <!-- <a href="" class="dropdown-item"><i data-feather="edit-3"></i> Edit Profile</a>
              <a href="page-profile-view.html" class="dropdown-item"><i data-feather="user"></i> View Profile</a> -->
              <div class="dropdown-divider"></div>
              <!-- <a href="" class="dropdown-item"><i data-feather="help-circle"></i> Help Center</a> -->
              <a href="#" class="dropdown-item"><i data-feather="settings"></i>Account Settings</a>
              <a href="/v1/settings" class="dropdown-item"><i data-feather="settings"></i>App Settings</a>
              <!-- <a href="" class="dropdown-item"><i data-feather="settings"></i>Privacy Settings</a> -->
              <a href="#" class="dropdown-item"><i data-feather="log-out"></i>Sign Out</a>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </div><!-- navbar-right -->
      </header><!-- navbar -->

    <div class="content content-fixed">
      <div class="container pd-20">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#" @click="get_roles()">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Website Analytics</li>
              </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
          </div>
          <div class="d-none d-md-block">
            <button class="btn btn-sm pd-x-15 btn-white btn-uppercase"><i data-feather="save" class="wd-10 mg-r-5"></i> Save</button>
            <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="upload" class="wd-10 mg-r-5"></i> Export</button>
            <button class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-l-5"><i data-feather="share-2" class="wd-10 mg-r-5"></i> Share</button>
            <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="sliders" class="wd-10 mg-r-5"></i> Settings</button>
          </div>
        </div>

        <div class="row row-xs">
         
          <div class="col-lg-4 col-md-6 mg-t-10">
            <div class="card">
              <div class="card-body pd-y-20 pd-x-25">
                <div class="row row-sm">
                  <div class="col-7">
                    <h3 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">3,605</h3>
                    <h6 class="tx-12 tx-semibold tx-uppercase tx-spacing-1 tx-primary mg-b-5">Click Through</h6>
                    <p class="tx-11 tx-color-03 mg-b-0">No. of clicks to ad that consist of a single impression.</p>
                  </div>
                  <div class="col-5">
                    <div class="chart-ten">
                      <div id="flotChart3" class="flot-chart"></div>
                    </div>
                  </div>
                </div>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-lg-4 col-md-6 mg-t-10">
            <div class="card">
              <div class="card-body pd-y-20 pd-x-25">
                <div class="row row-sm">
                  <div class="col-7">
                    <h3 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">3,266</h3>
                    <h6 class="tx-12 tx-semibold tx-uppercase tx-spacing-1 tx-teal mg-b-5">View Through</h6>
                    <p class="tx-11 tx-color-03 mg-b-0">Estimated daily unique views per visitor on the ads.</p>
                  </div>
                  <div class="col-5">
                    <div class="chart-ten">
                      <div id="flotChart4" class="flot-chart"></div>
                    </div>
                  </div>
                </div>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-lg-4 col-md-6 mg-t-10">
            <div class="card">
              <div class="card-body pd-y-20 pd-x-25">
                <div class="row row-sm">
                  <div class="col-7">
                    <h3 class="tx-normal tx-rubik tx-spacing--1 mg-b-5">8,765</h3>
                    <h6 class="tx-12 tx-semibold tx-uppercase tx-spacing-1 tx-pink mg-b-5">Total Conversions</h6>
                    <p class="tx-11 tx-color-03 mg-b-0">Estimated total conversions on ads per impressions to ads.</p>
                  </div>
                  <div class="col-5">
                    <div class="chart-ten">
                      <div id="flotChart5" class="flot-chart"></div>
                    </div>
                  </div>
                </div>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->
          
          <div class="col-lg-6 mg-t-10">
            <div class="card">
              <div class="card-header d-flex align-items-start justify-content-between">
                <h6 class="lh-5 mg-b-0">Total Orders</h6>
                <a href="#" class="tx-13 link-03">Mar 01 - Mar 20, 2019 <i class="icon ion-ios-arrow-down"></i></a>
              </div><!-- card-header -->
              <div class="card-body pd-y-15 pd-x-10">
                <div class="table-responsive">
                  <table class="table table-borderless table-sm tx-13 tx-nowrap mg-b-0">
                    <thead>
                      <tr class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase">
                        <th class="wd-5p">Link</th>
                        <th>Page Title</th>
                        <th class="text-right">Percentage (%)</th>
                        <th class="text-right">Value</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="align-middle text-center"><a href="#"><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a></td>
                        <td class="align-middle tx-medium">Homepage</td>
                        <td class="align-middle text-right">
                          <div class="wd-150 d-inline-block">
                            <div class="progress ht-4 mg-b-0">
                              <div class="progress-bar bg-teal wd-65p" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-right"><span class="tx-medium">65.35%</span></td>
                      </tr>
                      <tr>
                        <td class="align-middle text-center"><a href="#"><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a></td>
                        <td class="align-middle tx-medium">Our Services</td>
                        <td class="align-middle text-right">
                          <div class="wd-150 d-inline-block">
                            <div class="progress ht-4 mg-b-0">
                              <div class="progress-bar bg-primary wd-85p" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="text-right"><span class="tx-medium">84.97%</span></td>
                      </tr>
                      <tr>
                        <td class="align-middle text-center"><a href="#"><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a></td>
                        <td class="align-middle tx-medium">List of Products</td>
                        <td class="align-middle text-right">
                          <div class="wd-150 d-inline-block">
                            <div class="progress ht-4 mg-b-0">
                              <div class="progress-bar bg-warning wd-45p" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="text-right"><span class="tx-medium">38.66%</span></td>
                      </tr>
                      <tr>
                        <td class="align-middle text-center"><a href="#"><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a></td>
                        <td class="align-middle tx-medium">Contact Us</td>
                        <td class="align-middle text-right">
                          <div class="wd-150 d-inline-block">
                            <div class="progress ht-4 mg-b-0">
                              <div class="progress-bar bg-pink wd-15p" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="text-right"><span class="tx-medium">16.11%</span></td>
                      </tr>
                      <tr>
                        <td class="align-middle text-center"><a href="#"><i data-feather="external-link" class="wd-12 ht-12 stroke-wd-3"></i></a></td>
                        <td class="align-middle tx-medium">Product 50% Sale</td>
                        <td class="align-middle text-right">
                          <div class="wd-150 d-inline-block">
                            <div class="progress ht-4 mg-b-0">
                              <div class="progress-bar bg-teal wd-60p" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </td>
                        <td class="text-right"><span class="tx-medium">59.34%</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->
          <div class="col-lg-6 mg-t-10">
            <div class="card">
              <div class="card-header d-sm-flex align-items-start justify-content-between">
                <h6 class="lh-5 mg-b-0">User Consumption</h6>
                <a href="#" class="tx-13 link-03">Mar 01 - Mar 20, 2019 <i class="icon ion-ios-arrow-down"></i></a>
              </div><!-- card-header -->
              <div class="card-body pd-y-15 pd-x-10">
                <div class="table-responsive">
                  <table class="table table-borderless table-sm tx-13 tx-nowrap mg-b-0">
                    <thead>
                      <tr class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase">
                        <th class="wd-5p">&nbsp;</th>
                        <th>Browser</th>
                        <th class="text-right">Sessions</th>
                        <th class="text-right">Bounce Rate</th>
                        <th class="text-right">Conversion Rate</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><i class="fab fa-chrome tx-primary op-6"></i></td>
                        <td class="tx-medium">Google Chrome</td>
                        <td class="text-right">13,410</td>
                        <td class="text-right">40.95%</td>
                        <td class="text-right">19.45%</td>
                      </tr>
                      <tr>
                        <td><i class="fab fa-firefox tx-orange"></i></td>
                        <td class="tx-medium">Mozilla Firefox</td>
                        <td class="text-right">1,710</td>
                        <td class="text-right">47.58%</td>
                        <td class="text-right">19.99%</td>
                      </tr>
                      <tr>
                        <td><i class="fab fa-safari tx-primary"></i></td>
                        <td class="tx-medium">Apple Safari</td>
                        <td class="text-right">1,340</td>
                        <td class="text-right">56.50%</td>
                        <td class="text-right">11.00%</td>
                      </tr>
                      <tr>
                        <td><i class="fab fa-edge tx-primary"></i></td>
                        <td class="tx-medium">Microsoft Edge</td>
                        <td class="text-right">713</td>
                        <td class="text-right">59.62%</td>
                        <td class="text-right">4.69%</td>
                      </tr>
                      <tr>
                        <td><i class="fab fa-opera tx-danger"></i></td>
                        <td class="tx-medium">Opera</td>
                        <td class="text-right">380</td>
                        <td class="text-right">52.50%</td>
                        <td class="text-right">8.75%</td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- table-responsive -->
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- content -->

    <div class="modal fade" id="positionSelect" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        <div class="modal-content tx-14">

            {{-- <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel4">Select postions</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> --}}

            <div class="modal-body">
                <h6 class="modal-title" id="exampleModalLabel4">Select postions</h6>
                <div class="row">
                   <!--  <div class="col-12" style="border-right: 1px solid #e6e2e2;">
                        <v-select label="name" :options="jobs" :multiple="true" v-model="selected_jobs"></v-select>
                    </div> -->

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary tx-13" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-outline-warning tx-13"
                    @click.prevent="remove_postions()">Remove</button>
                <button type="button" class="btn btn-outline-primary tx-13" @click.prevent="add_postions()">Add</button>
            </div>
        </div>
    </div>
</div>

    <footer class="footer">
      <div>
        <span>&copy; 2019 Color-pro v1.0.0. </span>
        <span>Created by <a href="#">Sjr</a></span>
      </div>
      <div>
        <nav class="nav">
          <a href="https://themeforest.net/licenses/standard" class="nav-link">Licenses</a>
          <a href="http://themepixels.me/dashforge/change-log.html" class="nav-link">Change Log</a>
          <a href="https://discordapp.com/invite/RYqkVuw" class="nav-link">Get Help</a>
        </nav>
      </div>
    </footer>
    </div>
    <script src="{{ asset('new_assets/js/offline.min.js')}}"></script>
    <script src="{{ asset('new_assets/lib/date.min.js') }}"></script>
    <script src="{{ asset('new_assets/js/local.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.15/lodash.core.min.js"></script>
    <script src="{{ asset('new_assets/js/sweetalert.js') }}"></script>
    <script src="{{ asset('new_assets/lib/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('new_assets/js/app.js') }}"></script>
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
    <script src="{{ asset('new_assets/assets/js/pie/morris.js') }}"></script>
    <script src="{{ asset('new_assets/assets/js/chart.chartjs.js') }}"></script>
    <script src="{{ asset('new_assets/assets/js/pie/example.js') }}"></script>
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

    @yield('script')
    <script type="text/javascript">
      /*$('.dropdown').on('click', function() {
        $('[data-toggle=dropdown]').dropdown('toggle');
      });*/
      $('#dfSettingsShow').click(function() {
        $('.df-settings').toggleClass('show');
      });
      $('#acc_dropdown').click(function() {
        $('.acc_dropdown').toggleClass('show');
      });
    </script>

    <script>
       var app = new Vue({
          el: '#app',
          data: {
              showMenu: false,
              roles:[
                {role:'Admin',url:'#'},
                {role:'Candidate',url:'#'},
                {role:'User',url:'#'},
              ]
          },
      methods: {
            toggleShow: function() {
              this.showMenu = !this.showMenu;
            },
            get_roles: function(){
                        $("#positionSelect").modal('toggle');
              
            }
        
        },
        mounted(){
          alert('ssss')
        }
       });
 </script>
  </body>
</html>
