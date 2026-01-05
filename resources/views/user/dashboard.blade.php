@extends('layouts.public')

@section('title', 'Dashboard Pengunjung')

@section('content')
{{-- Hero Section --}}
<div class="hero text-center">
    <div class="container">
        <h1 class="display-4 mb-3">
            <i class="fas fa-hand-sparkles"></i> Selamat Datang, {{ auth()->user()->name }}!
        </h1>
        <p class="lead mb-4">Jelajahi koleksi seni terbaik, ikuti lelang eksklusif, dan temukan karya yang menginspirasi Anda.</p>
        
        <div class="row justify-content-center mt-4">
            <div class="col-md-3 mb-3">
                <div class="bg-white bg-opacity-25 rounded p-3">
                    <h3 class="mb-0">{{ auth()->user()->getRoleNames()->first() ?? 'user' }}</h3>
                    <small>Status Anda</small>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="bg-white bg-opacity-25 rounded p-3">
                    <h3 class="mb-0"><i class="fas fa-check-circle"></i></h3>
                    <small>Akun Aktif</small>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="bg-white bg-opacity-25 rounded p-3">
                    <h3 class="mb-0">{{ auth()->user()->created_at->format('Y') }}</h3>
                    <small>Member Sejak</small>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Quick Actions --}}
<div class="container my-5">
    <h2 class="text-center mb-4"><i class="fas fa-bolt text-warning"></i> Akses Cepat</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-images fa-2x text-primary"></i>
                    </div>
                    <h5 class="card-title">Galeri Virtual</h5>
                    <p class="card-text text-muted">Jelajahi koleksi karya seni dari berbagai seniman terbaik.</p>
                    <a href="{{ route('gallery.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-right"></i> Lihat Galeri
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-gavel fa-2x text-success"></i>
                    </div>
                    <h5 class="card-title">Lelang Aktif</h5>
                    <p class="card-text text-muted">Ikuti lelang eksklusif untuk mendapatkan karya seni pilihan.</p>
                    <a href="{{ route('auctions.public') }}" class="btn btn-success">
                        <i class="fas fa-arrow-right"></i> Lihat Lelang
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-user-tie fa-2x text-info"></i>
                    </div>
                    <h5 class="card-title">Profil Seniman</h5>
                    <p class="card-text text-muted">Kenali para seniman berbakat dan kurator profesional.</p>
                    <a href="{{ route('artists.public') }}" class="btn btn-info text-white">
                        <i class="fas fa-arrow-right"></i> Lihat Seniman
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Features Section --}}
<div class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4"><i class="fas fa-star text-warning"></i> Jelajahi Fitur Kami</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="bg-primary bg-opacity-10 rounded p-3 d-inline-block mb-3">
                            <i class="fas fa-calendar-alt fa-2x text-primary"></i>
                        </div>
                        <h5>Jadwal Pameran</h5>
                        <p class="text-muted">Jangan lewatkan pameran seni terbaru. Lihat jadwal, lokasi, dan informasi lengkap.</p>
                        <a href="{{ route('exhibitions.public') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-right"></i> Lihat Jadwal
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="bg-success bg-opacity-10 rounded p-3 d-inline-block mb-3">
                            <i class="fas fa-newspaper fa-2x text-success"></i>
                        </div>
                        <h5>Artikel & Ulasan</h5>
                        <p class="text-muted">Baca kritik seni, ulasan pameran, dan artikel menarik tentang dunia seni.</p>
                        <a href="{{ route('articles.public') }}" class="btn btn-outline-success">
                            <i class="fas fa-arrow-right"></i> Baca Artikel
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="bg-warning bg-opacity-10 rounded p-3 d-inline-block mb-3">
                            <i class="fas fa-landmark fa-2x text-warning"></i>
                        </div>
                        <h5>Koleksi Museum</h5>
                        <p class="text-muted">Akses arsip lengkap koleksi museum kami. Pelajari sejarah setiap karya.</p>
                        <a href="{{ route('museum.public') }}" class="btn btn-outline-warning">
                            <i class="fas fa-arrow-right"></i> Lihat Koleksi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Recent Activity / Stats --}}
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-chart-bar"></i> Statistik Platform</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-4">
                            <h3 class="text-primary">{{ \App\Models\Artwork::count() }}</h3>
                            <small class="text-muted">Karya Seni</small>
                        </div>
                        <div class="col-4">
                            <h3 class="text-success">{{ \App\Models\Artist::count() }}</h3>
                            <small class="text-muted">Seniman</small>
                        </div>
                        <div class="col-4">
                            <h3 class="text-warning">{{ \App\Models\Auction::where('status', 'active')->count() }}</h3>
                            <small class="text-muted">Lelang Aktif</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fas fa-user-circle"></i> Profil Saya</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td><strong>Nama:</strong></td>
                            <td>{{ auth()->user()->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Email:</strong></td>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>
                        <tr>
                            <td><strong>Bergabung:</strong></td>
                            <td>{{ auth()->user()->created_at->format('d F Y') }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-success btn-sm mt-2">
                        <i class="fas fa-edit"></i> Edit Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
