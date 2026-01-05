<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Art Lelang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Gallery Art Lelang</a>
            <div class="navbar-nav ms-auto">
                @auth
                    <span class="nav-link text-white">Halo, {{ optional(auth()->user())->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
                    </form>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Selamat Datang di Gallery Art Lelang</h1>
                
                @auth
                    <p>Anda login sebagai: <strong>{{ optional(auth()->user())->name }}</strong></p>
                    <p>Role: <strong>{{ auth()->user()->role }}</strong></p>
                @endauth

                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5>Karya Seni</h5>
                                <p>Lihat koleksi karya seni</p>
                                <a href="{{ route('gallery.index') }}" class="btn btn-primary">Lihat</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5>Lelang</h5>
                                <p>Ikuti lelang karya</p>
                                <a href="{{ route('auctions.public') }}" class="btn btn-primary">Lihat</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5>Artikel</h5>
                                <p>Baca artikel seni</p>
                                <a href="{{ route('articles.public') }}" class="btn btn-primary">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>