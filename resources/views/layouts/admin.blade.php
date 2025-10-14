<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - SMKN 1 Bangil</title>

    {{-- Memuat Font dan CSS Global --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- Font Awesome untuk Ikon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    {{-- CSS Global Anda --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- CSS Khusus untuk Halaman Admin --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @yield('style')
</head>
<body>

    <div class="admin-wrapper">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="{{ url('/admin/dashboard') }}" class="sidebar-logo">
                    <img src="{{ asset('img/logo-footer.png') }}" alt="Logo">
                    <span>Admin Panel</span>
                </a>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{ url('/admin/dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                   <li class="{{ request()->is('admin/berita*') ? 'active' : '' }}">
                        <a href="{{ route('admin.berita.index') }}"><i class="fas fa-newspaper"></i> Kelola Berita</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-images"></i> Kelola Galeri</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-trophy"></i> Kelola Prestasi</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-school"></i> Kelola Jurusan</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-chalkboard-teacher"></i> Kelola Guru</a>
                    </li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <div class="user-info">
                    <i class="fas fa-user-circle"></i>
                    <span>{{ Auth::user()->name }}</span>
                </div>
                <form method="POST" action="/admin/logout">
                    {{ method_field('POST') }}
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <div class="main-content" id="main-content">
            <header class="topbar">
                <button class="sidebar-toggle" id="sidebar-toggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="current-date">
                    {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                </div>
            </header>

            <main class="content-inner">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
    @yield('script')
</body>
</html>
