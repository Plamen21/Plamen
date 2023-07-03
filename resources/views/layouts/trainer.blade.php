<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto" id="courseNamesContainer">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trainer.coursesList') }}">
                                Trainers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trainer.studentsList') }}">
                                Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('courses.index') }}">
                                Grades
                            </a>
                        </li>
                        @auth
                            @if (Auth()->user()->hasRole('Admin'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('courses.index') }}">
                                        Pages
                                    </a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ route('publicInfo') }}"><i class="bi bi-info-circle"
                                    style="text-align: center; font-size: 28px"></i></a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if (auth()->user()->hasRole('student'))
                                        <a class="dropdown-item" href="{{ route('student.edit') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('profile-form-student').submit();">
                                            {{ __('Profile') }}
                                        </a>
                                        <form id="profile-form-student" action="{{ route('student.edit') }}" method="GET"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    @else
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('profile-form').submit();">
                                            {{ __('Profile') }}
                                        </a>
                                        <form id="profile-form" action="{{ route('profile.edit') }}" method="GET"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

    </div>
    <div class="container">
        @yield('content')
    </div>
</body>
