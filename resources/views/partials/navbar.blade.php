<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto" id="courseNamesContainer">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses.index') }}">
                        Courses
                    </a>
                </li>
                @auth
                    @if (auth()->user()->hasRole('student'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('my-courses') }}">
                                My courses
                            </a>
                        </li>
                    @endif
                @endauth
                @auth
                    @if (auth()->user()->hasRole('trainer'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trainer.index') }}">
                                TrainerPage
                            </a>
                        </li>
                    @endif
                @endauth
                @if (auth()->check() &&
                        auth()->user()->hasRole('client'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.index') }}">
                            Client Page
                        </a>
                    </li>
                @endif
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
                            @if (Auth()->user()->hasRole('admin'))
                                <a class="dropdown-item" href="{{ route('admin.index') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('admin-form').submit();">
                                    {{ __('Admin') }}
                                </a>
                                <form id="admin-form" action="{{ route('admin.index') }}" method="GET" class="d-none">
                                    @csrf
                                </form>
                            @endif
                            @if (auth()->user()->hasRole('student'))
                                <a class="dropdown-item" href="{{ route('profile.student.edit') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('profile-form-student').submit();">
                                    {{ __('Profile') }}
                                </a>
                                <form id="profile-form-student" action="{{ route('profile.student.edit') }}" method="GET"
                                    class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a class="dropdown-item" href="{{ route('profile.edit') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('profile-form').submit();">
                                    {{ __('Profile') }}
                                </a>
                                <form id="profile-form" action="{{ route('profile.edit') }}" method="GET" class="d-none">
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
