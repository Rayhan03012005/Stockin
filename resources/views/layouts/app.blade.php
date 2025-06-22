<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Stockin - @yield('title')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('knight/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('knight/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('knight/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('knight/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('knight/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('knight/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('knight/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('knight/assets/css/main.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('knight/assets/css/custom.css') }}" rel="stylesheet">

    <!-- Inline CSS untuk Sticky Footer -->
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            background-color: #212529;
        }
        .main {
            flex: 1 0 auto;
        }
        .footer {
            flex-shrink: 0;
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('welcome') }}" class="logo d-flex align-items-center">
                <h1 class="sitename">Stockin</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('welcome') }}" class="active">Home</a></li>
                    @if(session('user_id'))
                        @if(session('role') == 'admin')
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('admin.transactions') }}">Daftar Produk</a></li>
                        @elseif(session('role') == 'owner')
                            <li><a href="{{ route('owner.items') }}">My Items</a></li>
                        @elseif(session('role') == 'peminjam') 
                            <li><a href="{{ route('peminjam.items') }}">Browse Items</a></li>
                            <li><a href="{{ route('peminjam.transactions') }}">My Pinjaman</a></li>
                        @endif
                        <li><span class="ms-2">Welcome, {{ session('user_name') }} ({{ session('role') }})</span></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="header-social-links">
                <a href="https://x.com/" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="https://www.facebook.com/" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/" class="instagram"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </header>

    <main class="main">
        @if (session('success'))
            <div class="container mt-4">
                <div class="alert alert-success">{{ session('success') }}</div>
            </div>
        @endif
        @if ($errors->any())
            <div class="container mt-4">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        @yield('content')
    </main>

    <footer id="footer" class="footer">
        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Stockin</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('knight/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('knight/assets/vendor/php-email-form/validate.js') }}" defer></script>
    <script src="{{ asset('knight/assets/vendor/aos/aos.js') }}" defer></script>
    <script src="{{ asset('knight/assets/vendor/swiper/swiper-bundle.min.js') }}" defer></script>
    <script src="{{ asset('knight/assets/vendor/glightbox/js/glightbox.min.js') }}" defer></script>
    <script src="{{ asset('knight/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('knight/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}" defer></script>

    <!-- Main JS File -->
    <script src="{{ asset('knight/assets/js/main.js') }}" defer></script>

</body>

</html>