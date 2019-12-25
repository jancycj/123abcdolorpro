<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{url('/')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">User Management</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Company</a>
                        <ul class="sub-menu children dropdown-menu">                            <li><i class="fa fa-puzzle-piece"></i><a href="{{url('/admin/companies')}}">Comapany</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{url('/branches')}}">Branch</a></li>
                            <li><i class="fa fa-bars"></i><a href="{{url('/departments')}}">Departments</a></li>

                            <li><i class="fa fa-id-card-o"></i><a href="{{url('/employees')}}">Employee</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="{{url('/companies')}}">State</a></li>
                            <li><i class="fa fa-spinner"></i><a href="{{url('/admin/companies')}}">District </a></li>
                            <li><i class="fa fa-fire"></i><a href="{{url('/companies')}}">Locations</a></li>
                            <li><i class="fa fa-book"></i><a href="{{url('/companies')}}">Shades</a></li>
                            <li><i class="fa fa-th"></i><a href="{{url('/companies')}}">Genders</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Users</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">Users</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Permissions</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Costomers</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">Users</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Permissions</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->