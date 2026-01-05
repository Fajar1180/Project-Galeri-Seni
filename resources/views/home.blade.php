<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gallery Art Lelang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: bold;
            color: #667eea !important;
            font-size: 1.5rem;
        }
        
        .welcome-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 20px;
            padding: 40px;
            margin-top: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        
        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            border: none;
            height: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            margin-bottom: 20px;
        }
        
        .feature-title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        
        .feature-desc {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 20px;
        }
        
        .btn-feature {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 10px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-feature:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
            color: white;
        }
        
        .user-info {
            background: rgba(255,255,255,0.2);
            padding: 10px 20px;
            border-radius: 50px;
            color: white;
            font-weight: 500;
        }
        
        .btn-logout {
            background: rgba(255,255,255,0.2);
            border: 2px solid white;
            color: white;
            padding: 8px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-logout:hover {
            background: white;
            color: #667eea;
        }
        
        .stats-card {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            color: white;
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
        }
        
        .stats-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        
        .section-title {
            color: white;
            font-size: 2rem;
            font-weight: bold;
            margin: 40px 0 30px 0;
            text-align: center;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-in {
            animation: fadeInUp 0.6s ease forwards;
        }
        
        .quick-access {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-top: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .quick-link {
            display: block;
            padding: 15px 20px;
            color: #333;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
            border-left: 4px solid #667eea;
        }
        
        .quick-link:hover {
            background: #f8f9fa;
            padding-left: 30px;
            color: #667eea;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-palette"></i> Gallery Art Lelang
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    @auth
                        <li class="nav-item me-3">
                            <span class="user-info">
                                <i class="fas fa-user-circle"></i> {{ optional(auth()->user())->name }}
                            </span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-logout">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('register') }}">
                                <i class="fas fa-user-plus"></i> Register
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Welcome Card -->
        <div class="welcome-card animate-in">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-4 mb-3">
                        <i class="fas fa-hand-sparkles"></i> 
                        Selamat Datang, {{ optional(auth()->user())->name ?? 'Pengunjung' }}!
                    </h1>
                    <p class="lead mb-4">
                        Jelajahi koleksi seni terbaik, ikuti lelang eksklusif, dan temukan karya yang menginspirasi Anda.
                    </p>
                    @auth
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="stats-card">
                                    <div class="stats-number">{{ auth()->user()->role }}</div>
                                    <div class="stats-label">Status Anda</div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="stats-card">
                                    <div class="stats-number"><i class="fas fa-check-circle"></i></div>
                                    <div class="stats-label">Akun Aktif</div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="stats-card">
                                    <div class="stats-number">{{ date('Y') }}</div>
                                    <div class="stats-label">Member Sejak</div>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-palette" style="font-size: 10rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>

        <!-- Section Title -->
        <h2 class="section-title">
            <i class="fas fa-star"></i> Jelajahi Fitur Kami
        </h2>

        <!-- Feature Cards -->
        <div class="row">
            <!-- Galeri Virtual -->
            <div class="col-md-4 animate-in" style="animation-delay: 0.1s;">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-images"></i>
                    </div>
                    <h3 class="feature-title">Galeri Virtual</h3>
                    <p class="feature-desc">
                        Jelajahi koleksi karya seni dari berbagai seniman terbaik. Temukan inspirasi dari lukisan, patung, dan karya digital.
                    </p>
                    <a href="{{ route('gallery.index') }}" class="btn btn-feature">
                        <i class="fas fa-arrow-right"></i> Lihat Galeri
                    </a>
                </div>
            </div>

            <!-- Profil Seniman -->
            <div class="col-md-4 animate-in" style="animation-delay: 0.2s;">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3 class="feature-title">Profil Seniman</h3>
                    <p class="feature-desc">
                        Kenali para seniman berbakat dan kurator profesional. Pelajari perjalanan dan filosofi di balik karya mereka.
                    </p>
                    <a href="{{ route('artists.public') }}" class="btn btn-feature">
                        <i class="fas fa-arrow-right"></i> Lihat Seniman
                    </a>
                </div>
            </div>

            <!-- Jadwal Pameran -->
            <div class="col-md-4 animate-in" style="animation-delay: 0.3s;">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3 class="feature-title">Jadwal Pameran</h3>
                    <p class="feature-desc">
                        Jangan lewatkan pameran seni terbaru. Lihat jadwal, lokasi, dan informasi lengkap setiap pameran.
                    </p>
                    <a href="{{ route('exhibitions.public') }}" class="btn btn-feature">
                        <i class="fas fa-arrow-right"></i> Lihat Jadwal
                    </a>
                </div>
            </div>

            <!-- Lelang Karya -->
            <div class="col-md-4 animate-in" style="animation-delay: 0.4s;">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-gavel"></i>
                    </div>
                    <h3 class="feature-title">Lelang Karya</h3>
                    <p class="feature-desc">
                        Ikuti lelang eksklusif untuk mendapatkan karya seni pilihan. Ajukan penawaran dan miliki karya impian Anda.
                    </p>
                    <a href="{{ route('auctions.public') }}" class="btn btn-feature">
                        <i class="fas fa-arrow-right"></i> Ikut Lelang
                    </a>
                </div>
            </div>

            <!-- Artikel & Ulasan -->
            <div class="col-md-4 animate-in" style="animation-delay: 0.5s;">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <h3 class="feature-title">Artikel & Ulasan</h3>
                    <p class="feature-desc">
                        Baca kritik seni, ulasan pameran, dan artikel menarik tentang dunia seni kontemporer dari para ahli.
                    </p>
                    <a href="{{ route('articles.public') }}" class="btn btn-feature">
                        <i class="fas fa-arrow-right"></i> Baca Artikel
                    </a>
                </div>
            </div>

            <!-- Koleksi Museum -->
            <div class="col-md-4 animate-in" style="animation-delay: 0.6s;">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3 class="feature-title">Koleksi Museum</h3>
                    <p class="feature-desc">
                        Akses arsip lengkap koleksi museum kami. Pelajari sejarah dan makna di balik setiap karya bersejarah.
                    </p>
                    <a href="{{ route('museum.public') }}" class="btn btn-feature">
                        <i class="fas fa-arrow-right"></i> Lihat Koleksi
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Access Section -->
        <div class="row mt-4 mb-5">
            <div class="col-md-12">
                <div class="quick-access animate-in" style="animation-delay: 0.7s;">
                    <h4 class="mb-4">
                        <i class="fas fa-bolt"></i> Akses Cepat
                    </h4>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('guestbook.public') }}" class="quick-link">
                                <i class="fas fa-book"></i> Buku Tamu - Tinggalkan Pesan Anda
                            </a>
                            <a href="{{ route('auctions.public') }}" class="quick-link">
                                <i class="fas fa-fire"></i> Lelang Aktif - Bid Sekarang
                            </a>
                            <a href="{{ route('exhibitions.public') }}" class="quick-link">
                                <i class="fas fa-clock"></i> Pameran Mendatang
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('gallery.index') }}" class="quick-link">
                                <i class="fas fa-search"></i> Cari Karya Seni
                            </a>
                            <a href="{{ route('artists.public') }}" class="quick-link">
                                <i class="fas fa-users"></i> Direktori Seniman
                            </a>
                            <a href="{{ route('articles.public') }}" class="quick-link">
                                <i class="fas fa-rss"></i> Artikel Terbaru
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-white py-4" style="background: rgba(0,0,0,0.2);">
        <div class="container">
            <p class="mb-0">
                <i class="fas fa-palette"></i> Gallery Art Lelang &copy; {{ date('Y') }} | 
                Dibuat dengan <i class="fas fa-heart text-danger"></i>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animate cards on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-in').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });
    </script>
</body>
</html>