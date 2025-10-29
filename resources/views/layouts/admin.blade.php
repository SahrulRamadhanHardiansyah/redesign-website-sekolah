<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - SMKN 1 Bangil</title>

    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    
    {{-- Memuat Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- Font Awesome untuk Ikon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    {{-- CSS Global dan Admin Anda (pastikan ini dimuat setelah Bootstrap) --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    
    @yield('style')
</head>
<body>

    <div class="admin-wrapper">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
                    <img class="me-2" src="{{ asset('img/footer/logo-smk-putih-rbg.png') }}" alt="Logo">
                    <span >Admin Panel</span>
                </a>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                    <li class="{{ request()->is('admin/berita*') ? 'active' : '' }}">
                        <a href="{{ route('admin.berita.index') }}"><i class="fas fa-newspaper"></i> Kelola Berita</a>
                    </li>
                    <li class="{{ request()->is('admin/galeri*') ? 'active' : '' }}">
                        <a href="{{ route('admin.galeri.index') }}"><i class="fas fa-images"></i> Kelola Galeri</a>
                    </li>
                    <li class="{{ request()->is('admin/spmb*') ? 'active' : '' }}">
                        <a href="{{ route('admin.spmb.edit') }}"><i class="fas fa-graduation-cap"></i> Kelola SPMB</a>
                    </li>
                    <li class="{{ request()->is('admin/prestasi*') ? 'active' : '' }}">
                        <a href="{{ route('admin.prestasi.index') }}"><i class="fas fa-trophy"></i> Kelola Prestasi</a>
                    </li>
                    <li class="{{ request()->is('admin/ekstrakurikuler*') ? 'active' : '' }}">
                        <a href="{{ route('admin.ekstrakurikuler.index') }}"><i class="fas fa-chalkboard-teacher"></i> Kelola Ekstrakurikuler</a>
                    </li>
                    <li class="{{ request()->is('admin/gtk-data*') ? 'active' : '' }}">
                        <a href="{{ route('admin.gtk.edit') }}"><i class="fas fa-chart-bar"></i> Kelola Data GTK</a>
                    </li>
                    <li class="{{ request()->is('admin/faq*') ? 'active' : '' }}">
                        <a href="{{ route('admin.faq.index') }}"><i class="fas fa-question-circle"></i> Kelola FAQ</a>
                    </li>
                    <li class="{{ request()->is('admin/guestbook*') ? 'active' : '' }}">
                        <a href="{{ route('admin.guestbook.index') }}"><i class="fas fa-book-open"></i> Kelola Buku Tamu</a>
                    </li>
                    <li class="{{ request()->is('admin/users*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}"><i class="fas fa-users-cog"></i> Kelola User</a>
                    </li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <a href="{{ route('admin.profile.edit') }}" class="user-info-link">
                    <div class="user-info">
                        <i class="fas fa-user-circle"></i>
                        <span>{{ Auth::user()->name ?? 'Test User' }}</span>
                    </div>
                </a>
                <form method="POST" action="{{ route('admin.logout') }}">
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
                <div class="partner-logos">
                    <img src="{{ asset('img/footer/LogoPartner.png') }}" alt="Partner 1">
                </div>
            </header>

            <main class="content-inner">
                @yield('content')
            </main>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Script kustom Anda --}}
    <script src="{{ asset('js/admin.js') }}"></script>
    
    @yield('script')
</body>
</html>