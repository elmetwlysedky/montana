<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="{{asset('Dashboard1/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>محمد شریفی</p>
                <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="جستوجو ...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">ناوبری اصلی</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>پیشخوان</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> پیشخوان v1</a></li>
                    <li><a href="index2.html"><i class="fa fa-circle-o"></i> پیشخوان v2</a></li>
                </ul>
            </li>


            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>{{__('main.categories')}}</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('category.create')}}"><i class="fa fa-circle-o"></i>  {{__('main.create')}}</a></li>
                    <li><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i> {{__('main.categories')}}</a></li>
                </ul>
            </li>

            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>{{__('main.products')}}</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('product.create')}}"><i class="fa fa-circle-o"></i>  {{__('main.create')}}</a></li>
                    <li><a href="{{route('product.index')}}"><i class="fa fa-circle-o"></i> {{__('main.products')}}</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
