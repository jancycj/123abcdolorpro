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
           <li class="nav-item  ">
           <a href="{{url('/home')}}" class="nav-link"><i data-feather="pie-chart"></i> Home</a>
           </li>
           <li class="nav-item with-sub">
             <a href="#" class="nav-link"><i data-feather="package"></i> Catelog</a>
             <ul class="navbar-menu-sub">
             <li class="nav-sub-item"><a href="{{url('/admin/items')}}" class="nav-sub-link"><i data-feather="calendar"></i>Item</a></li>
               <li class="nav-sub-item"><a href="{{url('/admin/shades')}}" class="nav-sub-link"><i data-feather="message-square"></i>Shades</a></li>
               <li class="nav-sub-item"><a href="{{url('/admin/country')}}" class="nav-sub-link"><i data-feather="users"></i>Country</a></li>
               <li class="nav-sub-item"><a href="{{url('/admin/states')}}" class="nav-sub-link"><i data-feather="file-text"></i>States</a></li>
               <li class="nav-sub-item"><a href="{{url('/admin/districts')}}" class="nav-sub-link"><i data-feather="mail"></i>Districts</a></li>
               <li class="nav-sub-item"><a href="{{url('/admin/departments')}}" class="nav-sub-link"><i data-feather="mail"></i>Departments</a></li>
             </ul>
           </li>
           <li class="nav-item"><a href="{{url('/admin/process')}}" class="nav-link"><i data-feather="box"></i> Process</a></li>
           <li class="nav-item"><a href="{{url('/admin/companies')}}" class="nav-link"><i data-feather="box"></i> Companies</a></li>
           <li class="nav-item"><a href="{{url('/admin/customers')}}" class="nav-link"><i data-feather="box"></i> Customers</a></li>
           <li class="nav-item"><a href="{{url('/admin/reports')}}" class="nav-link"><i data-feather="archive"></i> reports</a></li>
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
           <div class="avatar avatar-sm"><img src="https://ui-avatars.com/api/?background=03a9f4&name={{Auth::user()->name}}&rounded=true&color=aee4fd" class="rounded-circle" alt=""></div>
         </a><!-- dropdown-link -->
         <div class="dropdown-menu dropdown-menu-right acc_dropdown">
         <div class="avatar avatar-lg mg-b-15"><img src="https://ui-avatars.com/api/?background=03a9f4&name={{Auth::user()->name}}&rounded=true&color=aee4fd" class="rounded-circle" alt=""></div>
           <h6 class="tx-semibold mg-b-5">{{Auth::user()->name}}</h6>
           <p class="mg-b-25 tx-12 tx-color-03">Administrator</p>
           <!-- <a href="" class="dropdown-item"><i data-feather="edit-3"></i> Edit Profile</a>
           <a href="page-profile-view.html" class="dropdown-item"><i data-feather="user"></i> View Profile</a> -->
           <div class="dropdown-divider"></div>
           <!-- <a href="" class="dropdown-item"><i data-feather="help-circle"></i> Help Center</a> -->
           <a href="#" class="dropdown-item"><i data-feather="settings"></i>Account Settings</a>
           <a href="/v1/settings" class="dropdown-item"><i data-feather="settings"></i>App Settings</a>
           <!-- <a href="" class="dropdown-item"><i data-feather="settings"></i>Privacy Settings</a> -->
           <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i data-feather="log-out"></i>Sign Out
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
         </div><!-- dropdown-menu -->
       </div><!-- dropdown -->
     </div><!-- navbar-right -->
   </header><!-- navbar -->