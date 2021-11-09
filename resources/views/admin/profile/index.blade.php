@extends('admin.admin_master')
@section('content')
@section('title')
    Mənim Hesabım
@endsection
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Mənim Hesabım</h4>
            </div>
        </div>
        <!-- /.row -->
        <!-- .row -->
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="white-box">
                    <div class="user-bg"> <img width="100%" alt="user" src="{{ asset(auth()->user()->image) }}">
                        <div class="overlay-box">
                            <div class="user-content">
                                <img src="{{ asset(auth()->user()->image) }}" class="thumb-lg img-circle" alt="img">
                                <h4 class="text-white">{{ auth()->user()->name }}</h4>
                                <h5 class="text-white">{{ auth()->user()->email }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="user-btm-box">
                        <div class="col-md-4 col-sm-4 text-center">
                            <p class="text-purple"><i class="fas fa-newspaper"></i></p>
                            <h1>{{ $post_count }}</h1>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <p class="text-blue"><i class="fas fa-comment-dots"></i></p>
                            <h1>{{ $comment_count }}</h1>
                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <p class="text-danger"><i class="fas fa-star"></i></p>
                            <h1>{{ $like_count }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <div class="white-box">
                    <ul class="nav nav-tabs tabs customtab">
                        <li class="active tab">
                            <a href="#profile" data-toggle="tab"> <span class="visible-xs">
                                    <i class="fa fa-user"></i></span> <span class="hidden-xs">Hesabım</span>
                            </a>
                        </li>
                        <li class="tab">
                            <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i
                                        class="fa fa-cog"></i></span> <span class="hidden-xs">Hesab
                                    Parametrləri</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Ad</strong>
                                    <br>
                                    <p class="text-muted">{{ auth()->user()->name }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Telefon</strong>
                                    <br>
                                    <p class="text-muted">{{ auth()->user()->phone }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                    <br>
                                    <p class="text-muted">{{ auth()->user()->email }}/p>
                                </div>
                            </div>
                            <hr>
                            <p class="m-t-30">
                                {{ auth()->user()->about }}
                            </p>
                        </div>
                        <div class="tab-pane" id="messages">
                            <div class="steamline">
                                <div class="sl-item">
                                    <div class="sl-left"> <img src="{{ asset('backend/plugins/images/users/genu.jpg') }}" alt="user"
                                            class="img-circle" /> </div>
                                    <div class="sl-right">
                                        <div class="m-l-40"> <a href="#" class="text-info">John Doe</a>
                                            <span class="sl-date">5 minutes ago</span>
                                            <div class="m-t-20 row">
                                                <div class="col-md-2 col-xs-12"><img src="{{ asset('backend/plugins/images/img1.jpg') }}"
                                                        alt="user" class="img-responsive" /></div>
                                                <div class="col-md-9 col-xs-12">
                                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                                                        nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed
                                                        nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis
                                                        ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.
                                                        Mauris massa</p> <a href="#" class="btn btn-success"> Design
                                                        weblayout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="sl-item">
                                    <div class="sl-left"> <img src="{{ asset('backend/plugins/images/users/sonu.jpg') }}" alt="user"
                                            class="img-circle" /> </div>
                                    <div class="sl-right">
                                        <div class="m-l-40"><a href="#" class="text-info">John Doe</a>
                                            <span class="sl-date">5 minutes ago</span>
                                            <p>assign a new task <a href="#"> Design weblayout</a></p>
                                            <div class="m-t-20 row"><img src="{{ asset('backend/plugins/images/img1.jpg') }}"
                                                    alt="user" class="col-md-3 col-xs-12" /> <img
                                                    src="{{ asset('backend/plugins/images/img2.jpg') }}" alt="user"
                                                    class="col-md-3 col-xs-12" /> <img src="{{ asset('backend/plugins/images/img3.jpg') }}"
                                                    alt="user" class="col-md-3 col-xs-12" /></div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="sl-item">
                                    <div class="sl-left"> <img src="{{ asset('backend/plugins/images/users/ritesh.jpg') }}"
                                            alt="user" class="img-circle" /> </div>
                                    <div class="sl-right">
                                        <div class="m-l-40"><a href="#" class="text-info">John Doe</a>
                                            <span class="sl-date">5 minutes ago</span>
                                            <p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante
                                                dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis
                                                sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="sl-item">
                                    <div class="sl-left"> <img src="{{ asset('backend/plugins/images/users/govinda.jpg') }}"
                                            alt="user" class="img-circle" /> </div>
                                    <div class="sl-right">
                                        <div class="m-l-40"><a href="#" class="text-info">John Doe</a>
                                            <span class="sl-date">5 minutes ago</span>
                                            <p>assign a new task <a href="#"> Design weblayout</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal form-material" method="POST"
                                action="{{ route('admin.users.update',auth()->user()) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="col-md-12">Ad</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Ad" value="{{ auth()->user()->name }}"
                                            class="form-control form-control-line" name="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="Email" value="{{ auth()->user()->email }}"
                                            class="form-control form-control-line" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Telefon</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Telefon" value="{{ auth()->user()->phone }}"
                                            class="form-control form-control-line" name="phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Haqqımda</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line" name="about">{{ auth()->user()->about }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Redaktə Et</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
