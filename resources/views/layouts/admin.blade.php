<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/styles/style.css') }}" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark custom-navbar">
            <div class="container">


                <div class="collapse navbar-collapse" id="navbarText">
                    {{-- Sidebar --}}
                    <ul class="navbar-nav side-nav">
                        <a class="navbar-brand" href="{{ route('admin.dashboard') }}"><img src="{{ asset('assets/images/logo.png') }}"
                                alt=""></a>
                        <li class="nav-item">
                            <a class="nav-link" style="margin-left: 20px; margin-top: 20px" href="{{ route('admin.dashboard') }}">Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard.admins') }}" style="margin-left: 20px;">Admins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard.countries') }}"
                                style="margin-left: 20px;">Countries</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard.cities') }}"
                                style="margin-left: 20px;">Cities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bookings-admins/show-bookings.html"
                                style="margin-left: 20px;">Bookings</a>
                        </li>
                    </ul>

                    {{-- Header --}}
                    @auth('admin')
                        <ul class="navbar-nav ml-md-auto d-md-flex">
                            <li class="nav-item">
                                <a class="nav-link" style="color: #123456; font-weight: bold" href="{{ route('admin.dashboard') }}">Home
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"
                                    style="color: #22b3c1; font-weight: bold; margin: 0 20px;" href="#"
                                    id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    {{ Auth::guard('admin')->user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none"> @csrf
                            </form>
                        @else
                            <a class="nav-link" style="color: #123456; font-weight: bold"
                                href="{{ route('admin.login') }}">Login
                            </a>
                        @endauth

                    </ul>
                </div>
            </div>
        </nav>
        @auth('admin')
            <div class="container-fluid">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        @else
            <main class="p-4">
                @yield('login-form')
            </main>
        @endauth
    </div>
    <script type="text/javascript"></script>
</body>

