<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #343a40;
            --success-color: #198754;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
            --info-color: #0dcaf0;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            font-size: 0.9rem;
        }

        /* Sidebar Styles */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--secondary-color) 0%, #2c3136 100%);
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            transition: all 0.3s;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            width: 250px;
        }

        .sidebar .nav-link {
            color: #ccc;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .sidebar .nav-link.active {
            background-color: var(--primary-color);
            color: #fff;
            box-shadow: 0 2px 5px rgba(13, 110, 253, 0.3);
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
            color: #fff;
            transform: translateX(5px);
        }

        .sidebar-header {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header h4 {
            color: white;
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .sidebar-header h4 i {
            margin-right: 10px;
            color: var(--primary-color);
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }

        .page-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #5a9fd8 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(13, 110, 253, 0.2);
            margin-bottom: 25px;
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid #eee;
            padding: 18px 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .card-header i {
            margin-right: 10px;
            color: var(--primary-color);
        }

        /* Stats Cards */
        .stats-card {
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            color: white;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            transform: translate(30px, -30px);
        }

        .stats-card.primary {
            background: linear-gradient(45deg, var(--primary-color), #5a9fd8);
        }

        .stats-card.success {
            background: linear-gradient(45deg, var(--success-color), #4caf9c);
        }

        .stats-card.danger {
            background: linear-gradient(45deg, var(--danger-color), #e57373);
        }

        .stats-card.warning {
            background: linear-gradient(45deg, var(--warning-color), #ffcc80);
            color: var(--dark-color);
        }

        .stats-card.info {
            background: linear-gradient(45deg, var(--info-color), #5eb3fd);
        }

        .stats-card i {
            font-size: 2.5rem;
            opacity: 0.8;
            position: absolute;
            right: 20px;
            top: 20px;
        }

        .stats-content {
            position: relative;
            z-index: 1;
        }

        .stats-value {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 10px 0;
        }

        .stats-label {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* Form Styles */
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 10px 15px;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
        }

        .btn {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
        }

        .btn i {
            margin-right: 8px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
        }

        .btn-danger {
            background-color: var(--danger-color);
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
            transform: translateY(-2px);
        }

        /* Table Styles */
        .table {
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead th {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 15px;
            font-weight: 600;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
        }

        .table tbody tr {
            transition: all 0.3s;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 15px;
            border: none;
        }

        .modal-header {
            border-bottom: 1px solid #eee;
            padding: 15px 20px;
        }

        .modal-body {
            padding: 20px;
        }

        .copy-btn {
            border-radius: 20px;
            padding: 6px 15px;
            transition: all 0.3s;
        }

        .copy-btn:hover {
            transform: scale(1.05);
        }

        /* Alert Styles */
        .alert {
            border-radius: 10px;
            border: none;
        }

        /* Mobile Responsiveness */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 101;
            background-color: var(--secondary-color);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            font-size: 1.2rem;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 99;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }

            .sidebar.active {
                width: 250px;
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .overlay.active {
                display: block;
            }

            .stats-card {
                margin-bottom: 15px;
            }

            .table-responsive {
                font-size: 0.8rem;
            }
        }

        /* Footer */
        .footer {
            margin-top: 30px;
            padding: 15px 0;
            text-align: center;
            color: #6c757d;
            font-size: 0.85rem;
        }

        /* Notification Toast */
        .notification-toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 10px;
            color: white;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 1050;
            display: flex;
            align-items: center;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }

        .notification-toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        .notification-toast i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .notification-toast.success {
            background-color: var(--success-color);
        }

        .notification-toast.danger {
            background-color: var(--danger-color);
        }

        .notification-toast.info {
            background-color: var(--primary-color);
        }
    </style>
</head>
<body>

<!-- Mobile Menu Toggle -->
<button class="mobile-menu-toggle" id="mobileMenuToggle">
    <i class="bi bi-list"></i>
</button>

<!-- Overlay for Mobile -->
<div class="overlay" id="overlay"></div>

<!-- Sidebar -->
<nav class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h4><i class="bi bi-speedometer2"></i> Admin Dashboard</h4>
    </div>
    <ul class="nav flex-column p-3">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                <i class="bi bi-house-door"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('perusahaan') ? 'active' : '' }}" href="/perusahaan">
                <i class="bi bi-building"></i> Perusahaan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('settings') ? 'active' : '' }}" href="/settings">
                <i class="bi bi-gear"></i> Settings
            </a>
        </li>
    </ul>
</nav>

<!-- Main Content -->
<div class="main-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h2 mb-0">Selamat Datang, Admin</h1>
                <p class="mb-0 opacity-75">Kelola perusahaan dan link WhatsApp rotator</p>
            </div>
            <a href="{{ url('/logout') }}" class="btn btn-danger">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <!-- <div class="row mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="stats-card primary">
                <i class="bi bi-building"></i>
                <div class="stats-content">
                    <div class="stats-value">{{ count($companies) }}</div>
                    <div class="stats-label">Total Perusahaan</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stats-card success">
                <i class="bi bi-people"></i>
                <div class="stats-content">
                    <div class="stats-value">24</div>
                    <div class="stats-label">Pengguna Aktif</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stats-card danger">
                <i class="bi bi-chat-dots"></i>
                <div class="stats-content">
                    <div class="stats-value">128</div>
                    <div class="stats-label">Pesan WhatsApp</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stats-card warning">
                <i class="bi bi-graph-up"></i>
                <div class="stats-content">
                    <div class="stats-value">87%</div>
                    <div class="stats-label">Tingkat Respons</div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Form Tambah Perusahaan -->
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="mb-0"><i class="bi bi-plus-circle"></i> Tambah Perusahaan Baru</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form id="addCompanyForm" action="{{ route('perusahaan.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="nama" class="form-label">Nama Perusahaan</label>
                    <input type="text" class="form-control" id="nama" name="nama" required />
                </div>
                <div class="col-md-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" />
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Tambah Perusahaan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Daftar Perusahaan -->
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0"><i class="bi bi-list-ul"></i> Daftar Perusahaan</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th class="text-center">Link WhatsApp Rotator</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($companies as $company)
                        <tr>
                            <td>{{ $company->nama }}</td>
                            <td>{{ $company->alamat }}</td>
                            <td class="text-center">
                                @if (!empty($company->slug))
                                    <button class="btn btn-success btn-sm copy-btn" 
                                            data-link="{{ url('/whatsapp-rotator/' . $company->slug . '/next') }}">
                                        <i class="bi bi-clipboard"></i> Salin Link
                                    </button>
                                @else
                                    <span class="badge bg-secondary">Slug belum tersedia</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                <i class="bi bi-inbox display-6 d-block mb-2"></i>
                                Belum ada perusahaan terdaftar.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; {{ date('Y') }} Admin Dashboard. All rights reserved.</p>
    </div>
</div>

<!-- Popup Notifikasi -->
<div class="modal fade" id="copyModal" tabindex="-1" aria-labelledby="copyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-body py-3">
        <p class="mb-0"><i class="bi bi-check-circle-fill text-success me-2"></i> Link WhatsApp Rotator telah disalin!</p>
      </div>
    </div>
  </div>
</div>

<!-- Popup Peringatan Nama Duplikat -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-body py-3">
        <p class="mb-0 text-danger fw-bold"><i class="bi bi-exclamation-triangle-fill me-2"></i> Nama perusahaan sudah terdaftar!</p>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS Salin Link & Mobile Menu -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Copy to clipboard functionality
        const copyButtons = document.querySelectorAll('.copy-btn');
        const copyModal = new bootstrap.Modal(document.getElementById('copyModal'));

        copyButtons.forEach(button => {
            button.addEventListener('click', () => {
                const link = button.getAttribute('data-link');
                navigator.clipboard.writeText(link)
                    .then(() => {
                        copyModal.show();
                        setTimeout(() => copyModal.hide(), 1500);
                    })
                    .catch(() => {
                        showNotification('❌ Gagal menyalin link.', 'danger');
                    });
            });
        });

        // Show error modal if there's an error message from backend
        @if (session('error'))
            const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
            setTimeout(() => errorModal.hide(), 2000);
        @endif

        // Mobile menu toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        mobileMenuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });

        // Close sidebar when clicking on a link in mobile view
        const sidebarLinks = document.querySelectorAll('.sidebar .nav-link');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('active');
                    overlay.classList.remove('active');
                }
            });
        });

        // Function to show notification
        function showNotification(message, type) {
            // Remove existing notifications
            const existingNotifications = document.querySelectorAll('.notification-toast');
            existingNotifications.forEach(notification => notification.remove());

            // Create new notification
            const notification = document.createElement('div');
            notification.className = `notification-toast ${type}`;
            
            let icon = '';
            if (type === 'success') icon = 'bi-check-circle-fill';
            else if (type === 'danger') icon = 'bi-exclamation-triangle-fill';
            else if (type === 'info') icon = 'bi-info-circle-fill';
            
            notification.innerHTML = `<i class="bi ${icon}"></i> ${message}`;
            document.body.appendChild(notification);

            // Show notification
            setTimeout(() => {
                notification.classList.add('show');
            }, 10);

            // Hide notification after 3 seconds
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }
    });
</script>

</body>
</html>