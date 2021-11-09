<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span></h3>
        </div>
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div>
                    <img src="{{ !empty(auth()->user()->image) ? asset(auth()->user()->image) : url('backend/plugins/images/default.jpg') }}"
                        alt="user-img" class="img-circle">
                </div>
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu animated flipInY">
                    <li><a href="{{ route('admin.profile.index') }}"><i class="ti-user"></i> Hesabım</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('admin.logout') }}"><i class="fa fa-power-off"></i> Çıxış</a></li>
                </ul>
            </div>
        </div>
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('admin.index') }}" class="waves-effect"><i class="mdi mdi-home fa-fw"></i>
                    <span class="hide-menu">Ana Səhifə</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}" class="waves-effect"><i class="mdi mdi-face fa-fw"></i>
                    <span class="hide-menu">İstifadəçilər</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index') }}" class="waves-effect">
                    <i class="mdi mdi-menu fa-fw"></i>
                    <span class="hide-menu">Kateqoriyalar</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.posts.index') }}" class="waves-effect">
                    <i class="fas fa-newspaper fa-fw"></i>
                    <span class="hide-menu">Məqalələr<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.posts.index') }}"><i class="fas fa-newspaper fa-fw"></i>
                            <span class="hide-menu">Məqalələr</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.posts.create') }}"><i class="fas fa-feather-alt fa-fw"></i>
                            <span class="hide-menu">Məqalə Yarat</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.tags.index') }}" class="waves-effect">
                    <i class="fas fa-tags fa-fw"></i>
                    <span class="hide-menu">Etiketlər</span>
                </a>
            </li>
        </ul>
    </div>
</div>
