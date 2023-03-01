<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">My Movies/TV Shows App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="moviesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Movies
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="moviesDropdown">
                            <li><a class="dropdown-item" href="{{ route('browse') }}">Browse All movies</a></li>
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Comedy</a></li>
                            <li><a class="dropdown-item" href="#">Drama</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="tvShowsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            TV Shows
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="tvShowsDropdown">
                            <li><a class="dropdown-item" href="{{ route('browsetv') }}">Browse all tv shows</a></li>
                            <li><a class="dropdown-item" href="#">Action & Adventure</a></li>
                            <li><a class="dropdown-item" href="#">Comedy</a></li>
                            <li><a class="dropdown-item" href="#">Drama</a></li>
                        </ul>
                    </li>
                    <li class="nav-link">
                        @if (Auth::check())
                        <div  >
                            <li class="nav-item"  ><a class="nav-link" href="#">{{ Auth::user()->name }}</a></li>
                            
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                
            </div>
        @else
            <li><a class="nav-link"  href="{{ route('login') }}">Login</a></li>
        @endif
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>

 

    <div class="col-md-12 text-center p-5 ">
        @yield('content')
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
    <script>
        // Toggle sidebar menu on mobile screens
        const sidebarMenu = document.querySelector('.sidebar-menu');
        const sidebarToggleBtn = document.querySelector('.sidebar-toggle-btn');
        
        sidebarToggleBtn.addEventListener('click', () => {
            sidebarMenu.classList.toggle('show');
        });
    </script>
    </body>
    </html>
