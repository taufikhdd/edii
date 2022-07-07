<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title','') | SIGISA Prov. Jambi | </title>
    <!-- initiate head with meta tags, css and script -->
    @include('include.head')

</head>

<body class="{{ $theme . 'mode' }}" data-base-url="{{ url('/') }}">
    <!-- Loader Starts -->
    @include('include.loader')
    <!--  Loader Ends -->

    <!--  Navbar Starts  -->
    <div class="header-container fixed-top">
        @include('include.header')
    </div>
    <!--  Navbar Ends  -->

    <!--  Main Container Starts  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <div class="rightbar-overlay"></div>

        <!--  Sidebar Starts  -->
        <div class="sidebar-wrapper sidebar-theme">
            @include('include.sidebar')
        </div>
        <!--  Sidebar Ends  -->

        <!--  Content Area Starts  -->
        <div id="content" class="main-content">
            <!-- Main Body Starts -->
            <!--  Navbar Starts / Breadcrumb Area  -->
            <div class="sub-header-container">
                <header class="header navbar navbar-expand-sm">
                    <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                        <i class="las la-bars"></i>
                    </a>
                    <ul class="navbar-nav flex-row">
                        <li>
                            <div class="page-header">
                                <nav class="breadcrumb-one" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboards</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            <span>{{$nav ?? '-'}}</span>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </li>
                    </ul>
                </header>
            </div>
            <!--  Navbar Ends / Breadcrumb Area  -->
            <!-- Main Body Starts -->
            <div class="layout-px-spacing">
                <div class="layout-top-spacing mb-2">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="container p-0">
                                @if ($errors->any())

                                <div class="alert alert-danger mb-4" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-label="{{__('Close')}}">
                                        <i class="las la-times"></i>
                                    </button>
                                    <strong>Peringatan!</strong><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <!-- Your Content Here -->
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Body Ends -->
            @include('include.responsive-message')

            <!-- Copyright Footer Starts -->
            @include('include.footer')
            <!-- Copyright Footer Ends -->

            <!-- Arrow Starts -->
            <div class="scroll-top-arrow" style="display: none;">
                <i class="las la-angle-up"></i>
            </div>
            <!-- Arrow Ends -->
        </div>
        <!--  Content Area Ends  -->

        <!--  Rightbar Area Starts -->
        <!-- include('include.rightbar') -->
        <!--  Rightbar Area Ends -->
    </div>
    <!-- Main Container Ends -->

    <!-- Common Script Starts -->
    @include('include.scripts')

    <!-- Common Script Ends -->

</body>

</html>
