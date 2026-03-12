<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Perusahaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

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

        /* Button Styles */
        .btn {
            border-radius: 8px;
            padding: 8px 15px;
            font-weight: 500;
            transition: all 0.3s;
            margin-right: 5px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
        }

        .btn-success {
            background-color: var(--success-color);
            border: none;
        }

        .btn-success:hover {
            background-color: #157347;
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

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
        }

        /* Form Styles */
        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 10px 15px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
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

            .table-responsive {
                font-size: 0.8rem;
            }

            .btn {
                padding: 5px 10px;
                font-size: 0.8rem;
            }
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
            <a class="nav-link {{ request()->is('dashboard') ? '' : '' }}" href="/dashboard">
                <i class="bi bi-house-door"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/perusahaan">
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
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <div>
                <h1 class="h2 mb-0">Daftar Perusahaan</h1>
                <p class="mb-0 opacity-75">Kelola data perusahaan dan link WhatsApp rotator</p>
            </div>
            <!-- <div>
                <a href="{{ url('/logout') }}" class="btn btn-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div> -->
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
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
                <i class="bi bi-check-circle-fill"></i>
                <div class="stats-content">
                    <div class="stats-value">{{ count($companies->where('whatsapp_nomor', '!=', null)) }}</div>
                    <div class="stats-label">Aktif</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stats-card warning">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <div class="stats-content">
                    <div class="stats-value">{{ count($companies->where('whatsapp_nomor', null)) }}</div>
                    <div class="stats-label">Perlu Update</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stats-card info">
                <i class="bi bi-link-45deg"></i>
                <div class="stats-content">
                    <div class="stats-value">{{ count($companies) }}</div>
                    <div class="stats-label">Total Link</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Perusahaan Table -->
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0"><i class="bi bi-list-ul"></i> Data Perusahaan</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Nama Perusahaan</th>
                            <th>Alamat</th>
                            <th>Link WhatsApp Rotator</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $perusahaan)
                        <tr data-id="{{ $perusahaan->id }}">
                            <form action="{{ route('perusahaan.update', $perusahaan->id) }}" method="POST" class="edit-form">
                                @csrf
                                @method('PUT')
                                <td>
                                    <a href="/whatsapp-rotator/{{ $perusahaan->slug }}" class="text-decoration-none view-mode fw-bold">{{ $perusahaan->nama }}</a>
                                    <input type="text" name="nama" class="form-control edit-mode" value="{{ $perusahaan->nama }}" style="display:none;" required>
                                </td>
                                <td>
                                    <span class="view-mode">{{ $perusahaan->alamat }}</span>
                                    <input type="text" name="alamat" class="form-control edit-mode" value="{{ $perusahaan->alamat }}" style="display:none;" required>
                                </td>
                                <td>
                                    @if ($perusahaan->whatsapp_nomor)
                                        <button type="button" class="btn btn-success btn-sm copy-btn"
                                            data-link="{{ url('/whatsapp-rotator/' . $perusahaan->slug . '/next') }}">
                                            <i class="bi bi-clipboard"></i> Salin Link
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-secondary btn-sm" disabled>
                                            <i class="bi bi-x-circle"></i> Tidak Ada Nomor
                                        </button>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm edit-btn view-mode" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button type="submit" class="btn btn-success btn-sm save-btn edit-mode" title="Simpan" style="display:none;">
                                        <i class="bi bi-check-lg"></i>
                                    </button>
                                    <button type="button" class="btn btn-secondary btn-sm cancel-btn edit-mode" title="Batal" style="display:none;">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </form>
                                <form action="{{ route('perusahaan.destroy', $perusahaan->id) }}" method="POST" class="delete-form" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm delete-btn view-mode" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
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

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="confirmDeleteLabel">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus perusahaan ini?</p>
                <p class="fw-bold text-danger">Data tidak dapat dikembalikan setelah dihapus!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i> Batal
                </button>
                <button type="button" id="confirmDeleteBtn" class="btn btn-danger">
                    <i class="bi bi-trash me-1"></i> Hapus
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
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

        // Table edit functionality
        const table = document.querySelector('table');

        table.addEventListener('click', function(e) {
            const button = e.target.closest('button');
            if (!button) return;

            const row = button.closest('tr');
            const cells = row.querySelectorAll('td');
            const namaCell = cells[0];
            const alamatCell = cells[1];
            const actionCell = cells[3];

            if (button.classList.contains('edit-btn')) {
                // Switch to edit mode
                namaCell.querySelector('.view-mode').style.display = 'none';
                alamatCell.querySelector('.view-mode').style.display = 'none';
                namaCell.querySelector('.edit-mode').style.display = 'inline-block';
                alamatCell.querySelector('.edit-mode').style.display = 'inline-block';

                actionCell.querySelector('.save-btn').style.display = 'inline-block';
                actionCell.querySelector('.cancel-btn').style.display = 'inline-block';
                actionCell.querySelector('.edit-btn').style.display = 'none';
            } else if (button.classList.contains('save-btn')) {
                // Prevent default form submit
                e.preventDefault();

                const namaInput = namaCell.querySelector('input');
                const alamatInput = alamatCell.querySelector('input');

                // Send AJAX request
                fetch(`/perusahaan/${row.dataset.id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        nama: namaInput.value,
                        alamat: alamatInput.value
                    })
                })
                .then(response => response.json())
                .then(data => {
                    namaCell.querySelector('.view-mode').textContent = data.nama;
                    alamatCell.querySelector('.view-mode').textContent = data.alamat;
                    namaCell.querySelector('.view-mode').style.display = 'inline-block';
                    namaCell.querySelector('.view-mode').href = `/whatsapp-rotator/${data.slug}`;
                    alamatCell.querySelector('.view-mode').style.display = 'inline-block';

                    // Hide edit inputs and buttons after save
                    namaCell.querySelector('.edit-mode').style.display = 'none';
                    alamatCell.querySelector('.edit-mode').style.display = 'none';

                    actionCell.querySelector('.save-btn').style.display = 'none';
                    actionCell.querySelector('.cancel-btn').style.display = 'none';
                    actionCell.querySelector('.edit-btn').style.display = 'inline-block';

                    // Show success notification
                    showNotification('Data berhasil diperbarui', 'success');
                })
                .catch(error => {
                    showNotification('Gagal menyimpan data', 'danger');
                });
            } else if (button.classList.contains('cancel-btn')) {
                // Cancel edit
                namaCell.querySelector('.view-mode').style.display = 'inline-block';
                alamatCell.querySelector('.view-mode').style.display = 'inline-block';
                namaCell.querySelector('.edit-mode').style.display = 'none';
                alamatCell.querySelector('.edit-mode').style.display = 'none';

                actionCell.querySelector('.save-btn').style.display = 'none';
                actionCell.querySelector('.cancel-btn').style.display = 'none';
                actionCell.querySelector('.edit-btn').style.display = 'inline-block';
            }
        });

        // Copy to clipboard functionality
        const copyButtons = document.querySelectorAll('.copy-btn');

        copyButtons.forEach(button => {
            button.addEventListener('click', function() {
                const link = this.dataset.link;
                navigator.clipboard.writeText(link).then(() => {
                    showNotification('Link WhatsApp Rotator telah disalin!', 'success');
                }).catch(err => {
                    showNotification('Gagal menyalin link: ' + err, 'danger');
                });
            });
        });

        // Delete functionality
        const deleteButtons = document.querySelectorAll('.delete-btn');
        let selectedForm = null;
        const confirmModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                selectedForm = this.closest('form');
                confirmModal.show();
            });
        });

        confirmDeleteBtn.addEventListener('click', function() {
            if (selectedForm) {
                const action = selectedForm.getAttribute('action');

                fetch(action, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) throw new Error('Gagal menghapus data');
                    return response.json();
                })
                .then(data => {
                    confirmModal.hide();
                    
                    // Remove row from table
                    const row = selectedForm.closest('tr');
                    row.style.transition = 'opacity 0.5s';
                    row.style.opacity = '0';
                    
                    setTimeout(() => {
                        row.remove();
                        // Update stats if needed
                        updateStats();
                    }, 500);

                    // Show success notification
                    showNotification(data.message || 'Perusahaan berhasil dihapus', 'success');
                })
                .catch(err => {
                    confirmModal.hide();
                    showNotification('Terjadi kesalahan: ' + err.message, 'danger');
                });
            }
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

        // Function to update stats (simplified version)
        function updateStats() {
            // In a real application, you would update the stats cards here
            // For this example, we'll just reload the page
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        }
    });
</script>

</body>
</html>