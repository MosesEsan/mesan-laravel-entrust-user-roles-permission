<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin | Strass</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin panel developed with the Bootstrap from Twitter.">
    <meta name="author" content="travis">

    <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/site.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/bootstrap-responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Moses Esan User Management</a>
            <div class="btn-group pull-right">
                <a class="btn" href="my-profile.html"><i class="icon-user"></i> {{ Auth::user()->name }}</a>
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/profile') }}">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/logout') }}">Logout</a></li>
                </ul>
            </div>
            <div class="nav-collapse">
                <ul class="nav">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    @role(('admin'))
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('users.create') }}">New User</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/users') }}">Manage Users</a></li>
                        </ul>
                    </li>
                    @endrole
                    @permission(('role-list'))
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Roles <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('roles.create') }}">New Role</a></li>
                            <li class="divider"></li>
                            <li><a  href="{{ url('/roles') }}">Manage Roles</a></li>
                        </ul>
                    </li>
                    @endpermission
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Clients<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('clients.create') }}">New Client</a></li>
                            <li class="divider"></li>
                            <li><a  href="{{ url('/clients') }}">Manage Clients</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row-fluid">
        <div class="span3">
            <div class="well sidebar-nav">
                <ul class="nav nav-list">
                    <li class="nav-header"><i class="icon-wrench"></i> Administration</li>
                    @role(('admin'))
                    <li><a href="{{ url('/users') }}">Users</a></li>
                    @endrole
                    @permission(('role-list'))
                    <li><a href="{{ url('/roles') }}">Roles</a></li>
                    @endpermission
                    <li><a href="{{ url('/clients') }}">Clients</a></li>
                    {{--<li><a href="{{ url('/candidates') }}">Candidates</a></li>--}}
                    <li class="nav-header"><i class="icon-user"></i> Profile</li>
                    <li><a href="{{ url('/profile') }}">My profile</a></li>
                    <li><a href="{{ url('/logout') }}">Logout</a></li>

                </ul>
            </div>
        </div>

        {{--class="active"--}}

        @yield('content')


    </div>

    <hr>

    <footer class="well">
        {{--&copy; --}}
    </footer>

</div>




<!-- Scripts -->
<script src="{{ URL::asset('js/jquery.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
