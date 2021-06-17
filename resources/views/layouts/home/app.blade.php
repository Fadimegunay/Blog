<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Yönetim Paneli</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="{{ asset('assets/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <!--bootstrap -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bootstrap-editable/inputs-ext/address/address.css') }}" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/material/material.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/material_style.css') }}">
    <!-- animation -->
    <link href="{{ asset('assets/css/pages/animate_page.css') }}" rel="stylesheet">
    <!-- Template Styles -->
    <link href="{{ asset('assets/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/formlayout.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme-color.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/summernote/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/dropzone/dropzone.css') }}" rel="stylesheet" media="screen">
    <!-- Date Time item CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css') }}" />
    <link href="{{ asset('assets/plugins/summernote/summernote.css') }}" rel="stylesheet">
    <!--select2-->
    <link href="{{ asset('assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

   <!-- script -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}" ></script>
    <script src="{{ asset('assets/plugins/popper/popper.min.js') }}" ></script>
    <script src="{{ asset('assets/js/jquery.inputmask.bundle.js') }}"></script>
    @yield('styles')
 </head>

 <body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
    <div class="page-wrapper">
        <!-- start header -->
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                    <a href="">
                    <img width="200" class="nicdark_width100_ipadpotr" src="" alt=""> </a>
                </div>
                <!-- logo end -->
                <ul class="nav navbar-nav navbar-left in">
                    <li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
                </ul>
                <!-- start mobile menu -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
               <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- start notification dropdown -->
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        </li>
                        <!-- end notification dropdown -->
                        <!-- start message dropdown -->
                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        </li>
                        <!-- end message dropdown -->
                        <!-- start manage user dropdown -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle " src="/assets/img/user.jpg" />
                                <span class="username username-hide-on-mobile"> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default animated jello">
                                <li class="divider"> </li>
                                <li>
                                    <a href="{{ route('logout') }}">
                                        <i class="icon-logout"></i> Çıkış </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="page-container">
            <!-- start sidebar menu -->
            <div class="sidebar-container">
                <div class="sidemenu-container navbar-collapse collapse fixed-menu">
                    <div id="remove-scroll">
                        <ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <li class="sidebar-user-panel">
                                <div class="user-panel">
                                    <div class="row">
                                        <div class="sidebar-userpic">
                                        @if(isset($authUser->profile_photo))
                                            <img src="{{ asset('storage/uploads/users/'.$authUser->profile_photo) }}" class="img-responsive" alt="">
                                        @else
                                            <img src="{{ asset('assets/img/user.jpg')}}" class="img-responsive" alt=""> 
                                        @endif
                                        </div>
                                        </div>
                                        <div class="profile-usertitle">
                                            <div class="sidebar-userpic-name"> </div>
                                            <div class="profile-usertitle-job">
                                                {{$authUser->role->name}}
                                            </div>
                                        </div>
                                        <div class="sidebar-userpic-btn">
                                            <a class="tooltips" href="{{ route('users.index') }}" data-placement="top" data-original-title="Kullanıcılar" title="Kullanıcı İşlmeleri">
                                                <i class="material-icons">person_outline</i>
                                            </a>
                                            <a class="tooltips" href="{{ route('logout') }}" data-placement="top" data-original-title="Çıkış" title="Çıkış Yap">
                                                <i class="material-icons">input</i>
                                            </a>
                                        </div>
                                </div>
                            </li>

                            <li class="nav-item start active">
                                <a href="{{ route('home') }}" class="nav-link nav-toggle">
                                    <span class="title">Anasayfa</span>
                                </a>
                            </li>
                            @if($authUser->role->name == 'Yönetici')
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle">
                                    <span class="title">Kullanıcılar</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}" class="nav-link ">
                                            <span class="title">Liste</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('users.create') }}" class="nav-link ">
                                            <span class="title">Oluştur</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                            @if($authUser->role->name != 'Okuyucu')
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle">
                                    <span class="title">Makale</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('blogs.index') }}" class="nav-link ">
                                            <span class="title">Liste</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('blogs.create') }}" class="nav-link ">
                                            <span class="title">Oluştur</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                            @if($authUser->role->name != 'Okuyucu' && $authUser->role->name != 'Yazar')
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle">
                                    <span class="title">Roller</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link ">
                                            <span class="title">Liste</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @yield('content')

    <div class="page-footer">
        <div class="page-footer-inner">  &copy; 
        <a target="_top" class="makerCss"></a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- end footer -->
</div>
<script>
    $(document).ready(function () {
        $(function(){

            $("#phone").inputmask("0(999) 999-9999");
            
            $("#phone").on("blur", function() {
                var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

                if( last.length == 5 ) {
                    var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );

                    var lastfour = last.substr(1,4);

                    var first = $(this).val().substr( 0, 9 );

                    $(this).val( first + move + '-' + lastfour );
                }
            });

            $("#mail").inputmask({
                regex: "^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[A-Za-z]+$",
                placeholder: ""
            });
        }); 
    });

</script>
<!-- start js include path -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}" ></script>
<script src="{{ asset('assets/plugins/popper/popper.min.js') }}" ></script>
<script src="{{ asset('assets/plugins/jquery-blockui/jquery.blockui.min.js') }}" ></script>
<script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- bootstrap -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" ></script>
<!-- counterup -->
<script src="{{ asset('assets/plugins/counterup/jquery.waypoints.min.js') }}" ></script>
<script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}" ></script>
<!-- Common js-->
<script src="{{ asset('assets/js/app.js') }}" ></script>
<script src="{{ asset('assets/js/layout.js') }}" ></script>
<script src="{{ asset('assets/js/theme-color.js') }}" ></script>
<!-- material -->
<script src="{{ asset('assets/plugins/material/material.min.js') }}"></script>
<!-- animation -->
<script src="{{ asset('assets/js/pages/ui/animations.js') }}" ></script>
<!-- summernote -->    
<script src="{{ asset('assets/plugins/summernote/summernote.min.js') }}" ></script>
<script src="{{ asset('assets/js/pages/summernote/summernote-data.js') }}" ></script>
<!-- chart js -->
<?php 
	$pageFileFooter = basename($_SERVER['PHP_SELF']); 
	if($pageFileFooter == "dashboard.php"){
?>
		<script src="{{ asset('assets/plugins/chart-js/Chart.bundle.js') }}" ></script>
		<script src="{{ asset('assets/plugins/chart-js/utils.js') }}" ></script>
		<script src="{{ asset('assets/js/pages/chart/chartjs/home-data2.js') }}" ></script>
<?php } ?>
<!-- sparkline -->
<script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.min.js') }}" ></script>
<script src="{{ asset('assets/js/pages/sparkline/sparkline-data.js') }}" ></script>
<script src="{{ asset('assets/js/pages/material_select/getmdl-select.js') }}" ></script>
<script  src="{{ asset('assets/plugins/material-datetimepicker/moment-with-locales.min.js') }}"></script>
<script  src="{{ asset('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js') }}"></script>
<script  src="{{ asset('assets/plugins/material-datetimepicker/datetimepicker.js') }}"></script>
<!-- dropzone -->
<script src="{{ asset('assets/plugins/dropzone/dropzone.js') }}" ></script>
<script src="{{ asset('assets/plugins/dropzone/dropzone-call.js') }}" ></script>
<!-- bootstrap tree -->
<script src="{{ asset('assets/plugins/bootstrap-treeview/bootstrap-treeview.js') }}" ></script>
<script src="{{ asset('assets/js/pages/treeview/treeview-data.js') }}" ></script>
<!-- summernote -->
<script src="{{ asset('assets/plugins/summernote/summernote.min.js') }}" ></script>
<script src="{{ asset('assets/js/pages/summernote/summernote-data.js') }}" ></script>
<!--select2-->
<script src="{{ asset('assets/plugins/select2/js/select2.js') }}" ></script>
<script src="{{ asset('assets/js/pages/select2/select2-init.js') }}" ></script>

 <!-- script -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}" ></script>
    <script src="{{ asset('assets/plugins/popper/popper.min.js') }}" ></script>
    <script src="{{ asset('assets/js/jquery.inputmask.bundle.js') }}"></script>
<!-- end js include path -->
@yield('scripts')
</body>

</html>