<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/icon.jpg') }}">

    <title>@yield('title') | Publisher Dashboard</title>

    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/bootstrap-reset.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/owl.carousel.css') }}" type="text/css">
    <link href="{{ asset('assets/admin/css/slidebars.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/style-responsive.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/data-tables/DT_bootstrap.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.min.css" media="all" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/assets/nestable/jquery.nestable.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <style>
        .kv-file-upload {
            display: none;
        }
    </style>
</head>

<body>

    <section id="container">
        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')
        @yield('content')
        @include('admin.layouts.right-sidebar')
        @include('admin.layouts.footer')
    </section>

    <script src="{{ asset('assets/admin/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('assets/admin/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/js/jquery.sparkline.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
    <script src="{{ asset('assets/admin/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.customSelect.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/respond.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/slidebars.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/common-scripts.js') }}"></script>
    <script src="{{ asset('assets/admin/js/sparkline-chart.js') }}"></script>
    <script src="{{ asset('assets/admin/js/easy-pie-chart.js') }}"></script>
    <script src="{{ asset('assets/admin/js/count.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('assets/admin/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/assets/data-tables/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/assets/data-tables/DT_bootstrap.js') }}"></script>
    <script src="{{ asset('assets/admin/js/editable-table.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/toastr-master/toastr.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/nestable/jquery.nestable.js') }}"></script>
    <script src="{{ asset('assets/admin/js/nestable.js') }}"></script>
    <script src="{{ asset('js/jsForAdmin.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.min.js"></script>
</body>

</html>