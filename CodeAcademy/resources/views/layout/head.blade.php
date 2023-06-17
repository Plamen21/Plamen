<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
   
    <title>@yield('title')</title>
</head>

<body>
    <div class="position-relative">
        <div class="container-fluid bg-primary text-white ">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6  z-10 text-end ">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-white font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="text-white ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div class="container-fluid p-5 bg-primary text-white text-center">
            <h1>Code Academy</h1>
        </div>



        <nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Начало</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle active" data-bs-auto-close="outside" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Курсове
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="dropend">
                                    <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                        href="/FronEnd">FronEnd</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/Courses/HTML" class="dropdown-item">HTML</a></li>
                                        <li><a href="/Courses/CSS" class="dropdown-item">CSS</a></li>
                                        <li><a href="/Courses/JavaScript" class="dropdown-item">JavaScript</a></li>
                                    </ul>
                                </li>
                                <li class="dropend">
                                    <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                        href="#">BackEnd</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/Courses/Php" class="dropdown-item">PHP</a></li>
                                        <li><a href="/Courses/Java" class="dropdown-item">Java</a></li>
                                        <li><a href="/Courses/CSharp" class="dropdown-item">C#</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="dropend">
                                    <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                        href="#">Database</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/Courses/MySQL" class="dropdown-item">MySQL</a></li>
                                        <li><a href="/Courses/Oracle" class="dropdown-item">Oracle</a></li>
                                        <li><a href="/Courses" class="dropdown-item"></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/Video/Video">Видео</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/lectors/lectors" tabindex="-1"
                                aria-disabled="true">Лектори</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="" href="/partners/Partners">Партньори</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/users">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/students">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/products">Products</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>
