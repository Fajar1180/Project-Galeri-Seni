@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1">Karya Seni</h6>
                        <h2 class="mb-0">{{ $stats['artworks'] }}</h2>
                    </div>
                    <i class="fas fa-image fa-3x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <a href="{{ route('admin.artworks.index') }}" class="text-white text-decoration-none">
                    Lihat Detail <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1">Seniman</h6>
                        <h2 class="mb-0">{{ $stats['artists'] }}</h2>
                    </div>
                    <i class="fas fa-users fa-3x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <a href="{{ route('admin.artists.index') }}" class="text-white text-decoration-none">
                    Lihat Detail <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1">Pameran</h6>
                        <h2 class="mb-0">{{ $stats['exhibitions'] }}</h2>
                    </div>
                    <i class="fas fa-calendar-alt fa-3x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <a href="{{ route('admin.exhibitions.index') }}" class="text-white text-decoration-none">
                    Lihat Detail <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase mb-1">Lelang Aktif</h6>
                        <h2 class="mb-0">{{ $stats['auctions'] }}</h2>
                    </div>
                    <i class="fas fa-gavel fa-3x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <a href="{{ route('admin.auctions.index') }}" class="text-white text-decoration-none">
                    Lihat Detail <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-newspaper"></i> Artikel</h5>
            </div>
            <div class="card-body text-center">
                <h1 class="display-4">{{ $stats['articles'] }}</h1>
                <a href="{{ route('admin.articles.index') }}" class="btn btn-sm btn-outline-primary">Kelola Artikel</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-comments"></i> Komentar</h5>
            </div>
            <div class="card-body text-center">
                <h1 class="display-4">{{ $stats['comments'] }}</h1>
                <a href="{{ route('admin.comments.index') }}" class="btn btn-sm btn-outline-primary">Kelola Komentar</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-archive"></i> Koleksi Museum</h5>
            </div>
            <div class="card-body text-center">
                <h1 class="display-4">{{ $stats['collections'] }}</h1>
                <a href="{{ route('admin.collections.index') }}" class="btn btn-sm btn-outline-primary">Kelola Koleksi</a>
            </div>
        </div>
    </div>

    @can('manage users')
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-users"></i> Users</h5>
            </div>
            <div class="card-body text-center">
                <h1 class="display-4">{{ $stats['users'] }}</h1>
                <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-primary">Kelola Users</a>
            </div>
        </div>
    </div>
    @endcan
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-info-circle"></i> Informasi Sistem</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>User Login:</strong> {{ optional(auth()->user())->name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><strong>Role:</strong> 
                    @foreach(auth()->user()->getRoleNames() as $role)
                        <span class="badge bg-primary">{{ $role }}</span>
                    @endforeach
                </p>
            </div>
            <div class="col-md-6">
                <p><strong>Laravel Version:</strong> {{ app()->version() }}</p>
                <p><strong>PHP Version:</strong> {{ phpversion() }}</p>
                <p><strong>Server Time:</strong> {{ now()->format('d F Y, H:i:s') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection