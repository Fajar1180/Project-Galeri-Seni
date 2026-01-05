<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Admin</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .sidebar {
            min-height: 100vh;
            background: #343a40;
        }
        .sidebar .nav-link {
            color: #c2c7d0;
            padding: 0.8rem 1rem;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: #007bff;
            color: white;
        }
        .main-header {
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,.08);
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar text-white p-0" style="width: 250px;">
            <div class="p-3 border-bottom border-secondary">
                <h4 class="mb-0"><i class="fas fa-palette"></i> Gallery Admin</h4>
            </div>
            <nav class="nav flex-column mt-3">
                <a class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a class="nav-link {{ request()->is('admin/artworks*') ? 'active' : '' }}" href="{{ route('admin.artworks.index') }}">
                    <i class="fas fa-image"></i> Karya Seni
                </a>
                <a class="nav-link {{ request()->is('admin/artists*') ? 'active' : '' }}" href="{{ route('admin.artists.index') }}">
                    <i class="fas fa-users"></i> Seniman & Kurator
                </a>
                <a class="nav-link {{ request()->is('admin/exhibitions*') ? 'active' : '' }}" href="{{ route('admin.exhibitions.index') }}">
                    <i class="fas fa-calendar-alt"></i> Jadwal Pameran
                </a>
                <a class="nav-link {{ request()->is('admin/auctions*') ? 'active' : '' }}" href="{{ route('admin.auctions.index') }}">
                    <i class="fas fa-gavel"></i> Lelang Karya
                </a>
                <a class="nav-link {{ request()->is('admin/articles*') ? 'active' : '' }}" href="{{ route('admin.articles.index') }}">
                    <i class="fas fa-newspaper"></i> Artikel & Ulasan
                </a>
                <a class="nav-link {{ request()->is('admin/comments*') ? 'active' : '' }}" href="{{ route('admin.comments.index') }}">
                    <i class="fas fa-comments"></i> Buku Tamu
                </a>
                <a class="nav-link {{ request()->is('admin/collections*') ? 'active' : '' }}" href="{{ route('admin.collections.index') }}">
                    <i class="fas fa-archive"></i> Koleksi Museum
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Header -->
            <header class="main-header p-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0">@yield('page-title', 'Dashboard')</h5>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                       @auth
    <i class="fas fa-user"></i> {{ optional(auth()->user())->name }}
@endauth

                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('home') }}"><i class="fas fa-home"></i> Lihat Website</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" type="submit"><i class="fas fa-sign-out-alt"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </header>

            <!-- Content -->
            <main class="p-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>