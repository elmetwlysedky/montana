
@include('Dashboard.Layouts1.header')

@include('Dashboard.Layouts1.navbar')

@include('Dashboard.Layouts1.sidebar')

<div class="content-wrapper">
    <section class="content-header">
        @yield('content')

    </section>
</div>



@include('Dashboard.Layouts1.footer')
