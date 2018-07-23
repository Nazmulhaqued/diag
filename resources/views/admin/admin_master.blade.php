
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Carbon - Admin Template</title>
<link rel="stylesheet" href="{{asset('public/assets/admin/./vendor/simple-line-icons/css/simple-line-icons.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/admin/./vendor/font-awesome/css/fontawesome-all.min.css')}}">
<link rel="stylesheet" href="{{asset('public/assets/admin/./css/styles.css')}}">
<script src="{{asset('public/assets/admin/./vendor/jquery/jquery.min.js')}}"></script>
<!--TinyMC link -->
<script src="{{asset('public/assets/admin/vendor/tinymce/js/tinymce/tinymce.min.js')}}"></script>

</head>
<body class="sidebar-fixed header-fixed">
<div class="page-wrapper">
<nav class="navbar page-header">
    <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
        <i class="fa fa-bars"></i>
    </a>

    <a class="navbar-brand" href="#">
        <img src="{{asset('public/assets/admin/')}}/./imgs/logo.png" alt="logo">
    </a>

    <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
        <i class="fa fa-bars"></i>
    </a>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
            <a href="#">
                <i class="fa fa-bell"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a>
        </li>

        <li class="nav-item d-md-down-none">
            <a href="#">
                <i class="fa fa-envelope-open"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{asset('public/assets/admin/')}}/./imgs/avatar-1.png" class="avatar avatar-sm" alt="logo">
                <span class="small ml-1 d-md-down-none">
                <?php

                $loggedin_user = Session::get('admin_name');

                if($loggedin_user){
                    echo  $loggedin_user;
                    Session::put('admin_name','');
                }

                ?>
                </span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">Account</div>

                <a href="#" class="dropdown-item">
                    <i class="fa fa-user"></i> Profile
                </a>

                <a href="#" class="dropdown-item">
                    <i class="fa fa-envelope"></i> Messages
                </a>

                <div class="dropdown-header">Settings</div>

                <a href="#" class="dropdown-item">
                    <i class="fa fa-bell"></i> Notifications
                </a>

                <a href="#" class="dropdown-item">
                    <i class="fa fa-wrench"></i> Settings
                </a>

                <a href="{{url('/logout')}}" class="dropdown-item">
                    <i class="fa fa-lock"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

<div class="main-container">
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">Navigation</li>

            <li class="nav-item">
                <a href="{{url('/dashboard')}}" class="nav-link active">
                    <i class="icon icon-speedometer"></i> Dashboard
                </a>
            </li>

            <li class="nav-item nav-dropdown">
                <a href="{{url('/manage-test')}}" class="nav-link nav-dropdown-toggle">
                    <i class="icon icon-target"></i> Test <i class="fa fa-caret-left"></i>
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{url('/add-test')}}" class="nav-link">
                            <i class="icon icon-target"></i> Add Test
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/manage-test')}}" class="nav-link">
                            <i class="icon icon-target"></i> Manage Test
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a href="{{url('/manage-doctor')}}" class="nav-link nav-dropdown-toggle">
                    <i class="icon icon-target"></i> Doctors/Ref <i class="fa fa-caret-left"></i>
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{url('/add-doctor')}}" class="nav-link">
                            <i class="icon icon-target"></i> Add Doctor
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/manage-doctor')}}" class="nav-link">
                            <i class="icon icon-target"></i> Manage Doctor
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a href="{{url('\manage-product')}}" class="nav-link nav-dropdown-toggle">
                    <i class="icon icon-graph"></i>Patient Name
 <i class="fa fa-caret-left"></i>
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{url('/add-patient')}}" class="nav-link">
                            <i class="icon icon-graph"></i> Add Patient
                        </a>
                    </li>
                </ul>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{url('/manage-patient')}}" class="nav-link">
                            <i class="icon icon-graph"></i> Manage Patient
                        </a>
                    </li>
                </ul>
            </li>

           <!--  <li class="nav-item nav-dropdown">
                <a href="{{url('#')}}" class="nav-link nav-dropdown-toggle">
                    <i class="icon icon-graph"></i>Copyright <i class="fa fa-caret-left"></i>
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{url('/add-Copyright')}}" class="nav-link">
                            <i class="icon icon-graph"></i> Add Copyright
                        </a>
                    </li>
                </ul>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{url('/manage-Copyright')}}" class="nav-link">
                            <i class="icon icon-graph"></i> Manage Copyright
                        </a>
                    </li>
                </ul>
            </li> -->

            </li>



        </ul>
    </nav>
</div>

    <div class="content">
        @yield('admin_content')
    </div>
</div>
</div>
<script>
  tinymce.init({
    selector: '#mytextarea',
    force_br_newlines : false,
    force_p_newlines : false,
    forced_root_block : ''
  });
</script>
<script src="{{asset('public/assets/admin/./vendor/popper.js/popper.min.js')}}"></script>
<script src="{{asset('public/assets/admin/./vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/admin/./vendor/chart.js/chart.min.js')}}"></script>
<script src="{{asset('public/assets/admin/./js/carbon.js')}}"></script>
<script src="{{asset('public/assets/admin/./js/demo.js')}}"></script>
</body>
</html>
