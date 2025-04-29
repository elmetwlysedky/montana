<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand">
        <a href="index.html" class="d-inline-block">
            <img src="{{asset('Dashboard/global_assets/images/logo_light.png')}}" alt="">

        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <span class="badge bg-success ml-md-3 mr-md-auto">Online</span>

        <ul class="navbar-nav">


            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
{{--                    <span>{{auth()->user()->name}}</span>--}}
                </a>

                <div class="dropdown-menu dropdown-menu-right">
{{--                    <a href="{{route('profile.edit')}}" class="dropdown-item"><i class="fas fa-user-cog "></i>{{ __('main.edit') }} {{ __('Profile') }}</a>--}}
{{--                    <a href="{{route('logout')}}" class="dropdown-item"><i class="icon-switch2"></i>{{__('main.logout')}} </a>--}}
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->
