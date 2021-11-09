<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <div class="top-left-part">
            <!-- Logo -->
            <a class="logo" href="index.html">
                <!-- Logo icon image, you can use font-icon also --><b>
                    <!--This is dark logo icon--><img src="{{ asset('backend/plugins/images/admin-logo.png') }}"
                        alt="home" class="dark-logo" />
                    <!--This is light logo icon--><img src="{{ asset('backend/plugins/images/admin-logo-dark.png') }}"
                        alt="home" class="light-logo" />
                </b>
                <!-- Logo text image you can use text also --><span class="hidden-xs">
                    <!--This is dark logo text--><img src="{{ asset('backend/plugins/images/admin-text.png') }}"
                        alt="home" class="dark-logo" />
                    <!--This is light logo text--><img src="{{ asset('backend/plugins/images/admin-text-dark.png') }}"
                        alt="home" class="light-logo" />
                </span>
            </a>
        </div>
        <!-- /Logo -->
        <!-- Search input and Toggle icon -->
        <ul class="nav navbar-top-links navbar-left">
            <li>
                <a href="javascript:void(0)" class="open-close waves-effect waves-light">
                    <i class="ti-menu"></i>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img
                        src="{{ !empty(auth()->user()->image) ? asset(auth()->user()->image) : url('backend/plugins/images/default.jpg') }}"
                        alt="user-img" width="36" class="img-circle"><b
                        class="hidden-xs">{{ auth()->user()->name }}</b><span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-user animated flipInY">
                    <li>
                        <div class="dw-user-box">
                            <div class="u-img"><img
                                    src="{{ !empty(auth()->user()->image) ? asset(auth()->user()->image) : url('backend/plugins/images/default.jpg') }}"
                                    alt="user" />
                            </div>
                            <div class="u-text">
                                <h4>{{ auth()->user()->name }}</h4>
                                <p class="text-muted">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('admin.profile.index') }}"><i class="ti-user"></i> Hesabım</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('admin.logout') }}"><i class="fa fa-power-off"></i> Çıxış</a></li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>
