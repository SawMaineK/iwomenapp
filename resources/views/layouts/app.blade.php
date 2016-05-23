<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>iWomen</title>

        <!-- Vendor CSS -->
        <link href="{{Request::root()}}/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="{{Request::root()}}/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="{{Request::root()}}/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="{{Request::root()}}/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        
        @yield('styles')
            
        <!-- CSS -->
        <link href="{{Request::root()}}/css/app.min.1.css" rel="stylesheet">
        <link href="{{Request::root()}}/css/app.min.2.css" rel="stylesheet">
        
    </head>
    <body>
        <header id="header">
            <ul class="header-inner">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>
            
                <li class="logo hidden-xs">
                    <a href="/">iWomen</a>
                </li>
                
                <li class="pull-right">
                    <ul class="top-menu">
                        <li id="toggle-width">
                            <div class="toggle-switch" style="color:white">
                                <input id="tw-switch" type="checkbox" hidden="hidden">
                                Menu On/Off &nbsp;&nbsp;<label for="tw-switch" class="ts-helper"></label>
                            </div>
                        </li>
                        <li class="hidden-xs" id="chat-trigger" data-trigger="#chat" style="z-index:-10;opacity:0;">
                            <a class="tm-chat" href="#"></a>
                        </li>
                    </ul>
                </li>
            </ul>
            
            <!-- Top Search Content -->
            <!-- <div id="top-search-wrap">
                <input type="text">
                <i id="top-search-close">&times;</i>
            </div> -->
        </header>
        
        <section id="main">
            <aside id="sidebar">
                <div class="sidebar-inner c-overflow">
                    <div class="profile-menu">
                        <a href="#">
                            <div class="profile-pic">
                                <img src="{{Request::root()}}/img/profile-pics/1.jpg" alt="">
                            </div>

                            <div class="profile-info">
                                    {{@Auth::user()->username}}
                                <i class="zmdi zmdi-settings"></i>
                            </div>
                        </a>

                        <ul class="main-menu">
                            <li>
                                <a href="/logout"><i class="zmdi zmdi-time-restore"></i> Logout</a>
                            </li>
                        </ul>
                    </div>

                    <ul class="main-menu">
                        <li class="active"><a href="/"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-view-list"></i> Posts</a>

                            <ul>
                                <li><a href="/posts"> List</a></li>
                                <li><a href="/posts/create">Create New Post</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-view-list"></i> tlgProfiles</a>

                            <ul>
                                <li><a href="/tlgProfiles"> List</a></li>
                                <li><a href="/tlgProfiles/create">Create New tlgProfiles</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-view-list"></i> Authors</a>

                            <ul>
                                <li><a href="/authors"> List</a></li>
                                <li><a href="/authors/create">Create New Authors</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-view-list"></i> Avators</a>

                            <ul>
                                <li><a href="/avators"> List</a></li>
                                <li><a href="/avators/create">Create New Avators</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-view-list"></i> Resources</a>

                            <ul>
                                <li><a href="/resources"> List</a></li>
                                <li><a href="/resources/create">Create New Resources</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-view-list"></i> iWomenPosts</a>

                            <ul>
                                <li><a href="/iwomenPosts"> List</a></li>
                                <li><a href="/iwomenPosts/create">Create New iWomenPosts</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-view-list"></i> Sub Resource Details</a>

                            <ul>
                                <li><a href="/subResourceDetails"> List</a></li>
                                <li><a href="/subResourceDetails/create">Create New Sub Resource Details</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-view-list"></i> Comments</a>

                            <ul>
                                <li><a href="/comments"> List</a></li>
                                <li><a href="/comments/create">Create New Comments</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-view-list"></i> Sister Download Apps</a>

                            <ul>
                                <li><a href="/sisterDownloadApps"> List</a></li>
                                <li><a href="/sisterDownloadApps/create">Create New Sister Download Apps</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-view-list"></i> Sticker Stores</a>

                            <ul>
                                <li><a href="/stickerStores"> List</a></li>
                                <li><a href="/stickerStores/create">Create New Sticker Stores</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-view-list"></i> Point's Price</a>

                            <ul>
                                <li><a href="/pointPrices"> List</a></li>
                                <li><a href="/pointPrices/create">Create New Point's Price</a></li>
                            </ul>
                        </li>


                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-view-list"></i> Users</a>

                            <ul>
                                <li><a href="/users"> List</a></li>
                                <li><a href="/users/create">Create New Users</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-view-list"></i> Categories</a>

                            <ul>
                                <li><a href="/categories"> List</a></li>
                                <li><a href="/categories/create">Create New Categories</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="#"><i class="zmdi zmdi-view-list"></i> Calendars</a>

                            <ul>
                                <li><a href="/calendars"> List</a></li>
                                <li><a href="/calendars/create">Create New Calendars</a></li>
                            </ul>
                        </li>
                        <li> <a href="/admin/competition-question"><i class="zmdi zmdi zmdi zmdi-collection-text"></i>Competition Questions</a></li>
                        <li class="sub-menu @if(isset($title)) toggled @endif">
                            <a href="#"><i class="zmdi zmdi zmdi zmdi-layers"></i>Competition Answers</a>

                            <ul @if(isset($title)) style="display: block;" @endif>
                                <li><a @if(isset($title) && $title=='Competition Answer List (Submitted)') class="active" @endif href="/admin/competition-answers">Submitted Answers</a></li>
                                <li><a @if(isset($title) && $title=='Competition Answer List (Unsubmitted)') class="active" @endif href="/admin/competition-answers?q=unsubimt">Unsubmitted Answers</a></li>
                            </ul>
                        </li>
                        <li><a href="/admin/group-users"><i class="zmdi zmdi zmdi zmdi-accounts-add"></i>Competition Group Users</a></li>

                        
                        <li>&nbsp;<br><br></li>
                        <li>&nbsp;<br><br></li>

                    </ul>
                </div>
            </aside>
            
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <!-- <h2>Dashboard</h2> -->
                    </div>

                    @yield('content')
                    
                </div>
            </section>
        </section>
        
        <footer id="footer">
            Copyright &copy; 2015 iWomen
            
            <ul class="f-menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </footer>
        
        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>   
        <![endif]-->
        
        <!-- Javascript Libraries -->
        <script src="{{Request::root()}}/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="{{Request::root()}}/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
        
        <script src="{{Request::root()}}/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="{{Request::root()}}/vendors/bower_components/jquery.nicescroll/jquery.nicescroll.min.js"></script>
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="{{Request::root()}}/vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
        @yield('scripts')
        
        
        <script src="{{Request::root()}}/js//functions.js"></script>
        <!-- 
        <script src="{{Request::root()}}/js//demo.js"></script>
         -->
        

        
    </body>
  
</html>