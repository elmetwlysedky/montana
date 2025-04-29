
<div class="page-content">
<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-right8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="{{asset('Dashboard/global_assets/images/logo_light.png')}}" width="38" height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <!-- <div class="media-title font-weight-semibold"></div> -->
                        <div class="font-size-xs opacity-50">
                            <!-- <i class="icon-pin font-size-sm"></i> &nbsp; -->
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <!-- <a href="#" class="text-white"><i class="icon-cog3"></i></a> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="icon-home4"></i>
                        <span>الصفة الرئيسيه</span>

                    </a>
                </li>

                <li class="nav-item nav-item-submenu">
{{--                    <a href="{{route('clients')}}" class="nav-link"><i class="icon-users mr-3"></i> <span>{{__('main.clients')}}</span></a>--}}
                </li>

                <li class="nav-item nav-item-submenu">
{{--                    <a href="{{route('restaurants')}}" class="nav-link"><i class="mi-restaurant mr-3 "></i><span>{{__('main.restaurants')}}</span></a>--}}

                </li>

                <li class="nav-item nav-item-submenu">
{{--                    <a href="{{route('order.index')}}" class="nav-link"><i class="icon-cart5 mr-3 "></i><span>{{__( 'main.orders')}}</span></a>--}}
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"> <i class="icon-city mr-3"></i> <span>{{__('main.cities')}}</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">

{{--                        <li class="nav-item"><a href="{{route('city.index')}}" class="nav-link"> {{__('main.cities')}}</a></li>--}}
{{--                         <li class="nav-item"><a href="{{route('city.create')}}" class="nav-link">{{__('main.add')}} {{__('main.cities')}}</a></li>--}}

                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"> <i class="fas fa-city mr-3 "></i> <span>{{__('main.region')}}</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">

{{--                        <li class="nav-item"><a href="{{route('region.index')}}" class="nav-link"> {{__('main.region')}}</a></li>--}}
{{--                        <li class="nav-item"><a href="{{route('region.create')}}" class="nav-link">{{__('main.add')}} {{__('main.region')}} </a></li>--}}

                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-grid6 mr-3 "></i><span>{{__( 'main.categories')}}</span></a>
                    <ul class="nav nav-group-sub">
{{--                        <li class="nav-item"><a href="{{route('category.create')}}" class="nav-link"> {{__( 'main.create')}} {{__( 'main.categories')}}</a></li>--}}
{{--                        <li class="nav-item"><a href="{{route('category.index')}}" class="nav-link">{{__( 'main.table')}} {{__( 'main.categories')}}</a></li>--}}
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu">
{{--                    <a href="{{route('offer.index')}}" class="nav-link"><i class="mi-local-offer mr-3 "></i><span>{{__( 'main.offers')}}</span></a>--}}
                </li>


                <li class="nav-item nav-item-submenu">
                    <a href="" class="nav-link"><i class="icon-cash3 mr-3"> </i> <span>{{__('main.restaurant_payments')}}</span></a>
                    <ul class="nav nav-group-sub">
{{--                        <li class="nav-item"><a href="{{route('payment.create')}}" class="nav-link"> {{__( 'main.create')}} {{__( 'main.payment')}}</a></li>--}}
{{--                        <li class="nav-item"><a href="{{route('payment.index')}}" class="nav-link">  {{__( 'main.payments')}}</a></li>--}}
{{--                        <li class="nav-item"><a href="{{route('commissions.monthly')}}" class="nav-link">{{__( 'main.payments')}} {{__('main.monthly')}}</a></li>--}}
                    </ul>
                </li>


                <li class="nav-item nav-item-submenu">
{{--                    <a href="{{route('contacts')}}" class="nav-link"><i class="fas fa-envelope mr-3 "></i> <span>{{__('main.messages')}}</span></a>--}}

                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-user-tie mr-3"></i> <span>{{__('main.employees')}}</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
{{--                        <li class="nav-item "><a href="{{route('user.index')}}" class="nav-link"><i class="icon-user-tie mr-3"></i> <span>{{__('main.employees')}} </span></a></li>--}}
{{--                        <li class="nav-item "><a href="#" class="nav-link"><i class="icon-user-plus"></i> <span>{{__('main.add')}} {{__('main.employee')}} </span></a></li>--}}
                    </ul>
                </li>



                <li class="nav-item nav-item-submenu">
                    <a href="" class="nav-link"><i class="icon-gear"></i><span>الاعدادات</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">

{{--                        <li class="nav-item"><a href="{{route('setting.general')}}" class="nav-link">{{__( 'main.general')}} </a></li>--}}
{{--                        <li class="nav-item"><a href="{{route('setting.commission')}}" class="nav-link">{{__( 'main.commission')}}</a></li>--}}
{{--                        <li class="nav-item"><a href="{{route('setting.about')}}" class="nav-link">{{__( 'main.about')}}</a></li>--}}
{{--                        <li class="nav-item"><a href="{{route('permission.index')}}" class="nav-link">{{__( 'main.permissions')}}  </a></li>--}}
{{--                        <li class="nav-item"><a href="{{route('role.index')}}" class="nav-link">{{__( 'main.roles')}} </a></li>--}}



                    </ul>
                </li>

                <!-- /forms -->







            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /main sidebar -->
