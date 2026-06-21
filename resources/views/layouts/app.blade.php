<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - @yield('title', 'Sistem Informasi Akademik')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; }
        .sidebar { min-height: 100vh; background: linear-gradient(135deg, #1e3a5f, #2d6a9f); }
        .sidebar .nav-link { color: rgba(255,255,255,.8); border-radius: 8px; margin: 2px 0; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: rgba(255,255,255,.15); color: #fff; }
        .sidebar .brand { color: #fff; font-weight: 700; font-size: 1.2rem; }
        .main-content { padding: 25px; }
        .card { border: none; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,.08); }
        .stat-card { border-left: 4px solid; }
        .table-card .card-header { background: linear-gradient(135deg, #1e3a5f, #2d6a9f); color: white; border-radius: 12px 12px 0 0 !important; }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar p-3">
            <div class="brand mb-4 ps-2">
                <i class="fas fa-graduation-cap me-2"></i>SIAKAD
            </div>
            <nav class="nav flex-column gap-1">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home me-2"></i>Dashboard
                </a>

                @if(auth()->user()->role === 'admin')
                    <div class="text-white-50 small mt-3 mb-1 ps-2">MASTER DATA</div>
                    <a href="{{ route('admin.dosen.index') }}" class="nav-link {{ request()->routeIs('admin.dosen*') ? 'active' : '' }}">
                        <i class="fas fa-chalkboard-teacher me-2"></i>Dosen
                    </a>
                    <a href="{{ route('admin.mahasiswa.index') }}" class="nav-link {{ request()->routeIs('admin.mahasiswa*') ? 'active' : '' }}">
                        <i class="fas fa-user-graduate me-2"></i>Mahasiswa
                    </a>
                    <a href="{{ route('admin.matakuliah.index') }}" class="nav-link {{ request()->routeIs('admin.matakuliah*') ? 'active' : '' }}">
                        <i class="fas fa-book me-2"></i>Mata Kuliah
                    </a>
                    <div class="text-white-50 small mt-3 mb-1 ps-2">AKADEMIK</div>
                    <a href="{{ route('admin.jadwal.index') }}" class="nav-link {{ request()->routeIs('admin.jadwal*') ? 'active' : '' }}">
                        <i class="fas fa-calendar-alt me-2"></i>Jadwal
                    </a>
                    <a href="{{ route('admin.krs.index') }}" class="nav-link {{ request()->routeIs('admin.krs*') ? 'active' : '' }}">
                        <i class="fas fa-clipboard-list me-2"></i>KRS
                    </a>
                @else
                    <div class="text-white-50 small mt-3 mb-1 ps-2">AKADEMIK</div>
                    <a href="{{ route('mahasiswa.krs.index') }}" class="nav-link {{ request()->routeIs('mahasiswa.krs*') ? 'active' : '' }}">
                        <i class="fas fa-clipboard-list me-2"></i>KRS Saya
                    </a>
                    <a href="{{ route('mahasiswa.jadwal.index') }}" class="nav-link {{ request()->routeIs('mahasiswa.jadwal*') ? 'active' : '' }}">
                        <i class="fas fa-calendar-alt me-2"></i>Jadwal
                    </a>
                @endif
            </nav>

            <div class="mt-auto pt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-light btn-sm w-100">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10 main-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold text-dark mb-0">@yield('title')</h5>
                <span class="text-muted"><i class="fas fa-user me-1"></i>{{ auth()->user()->name }}
                    <span class="badge bg-primary ms-1">{{ ucfirst(auth()->user()->role) }}</span>
                </span>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>