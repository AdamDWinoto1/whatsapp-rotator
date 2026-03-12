<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pengaturan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #343a40;
            --success-color: #198754;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
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

        /* Button Styles */
        .btn {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s;
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

        /* Profile Image Styles */
        .profile-image-container {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 20px;
        }

        .profile-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .profile-icon {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #e9ecef;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .profile-edit-icon {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background-color: var(--primary-color);
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            transition: all 0.3s;
        }

        .profile-edit-icon:hover {
            transform: scale(1.1);
            background-color: #0b5ed7;
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
            <a class="nav-link {{ request()->is('perusahaan') ? '' : '' }}" href="/perusahaan">
                <i class="bi bi-building"></i> Perusahaan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('settings') ? 'active' : '' }}" href="/settings">
                <i class="bi bi-gear"></i> Pengaturan
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
                <h1 class="h2 mb-0">Pengaturan</h1>
                <p class="mb-0 opacity-75">Kelola profil dan keamanan akun Anda</p>
            </div>
            <div>
                <a href="{{ url('/logout') }}" class="btn btn-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="stats-card primary">
                <i class="bi bi-person-fill"></i>
                <div class="stats-content">
                    <div class="stats-value">1</div>
                    <div class="stats-label">Akun Aktif</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stats-card success">
                <i class="bi bi-shield-check"></i>
                <div class="stats-content">
                    <div class="stats-value">Aman</div>
                    <div class="stats-label">Status Keamanan</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stats-card warning">
                <i class="bi bi-calendar-check"></i>
                <div class="stats-content">
                    <div class="stats-value">{{ date('d/m/Y') }}</div>
                    <div class="stats-label">Terakhir Login</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="stats-card info">
                <i class="bi bi-clock-history"></i>
                <div class="stats-content">
                    <div class="stats-value">{{ date('H:i') }}</div>
                    <div class="stats-label">Waktu Aktif</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Profile Update Card -->
        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h3 class="mb-0"><i class="bi bi-person-circle"></i> Update Profile</h3>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div class="profile-image-container">
                            <div class="profile-icon" id="profileIcon">
                                <i class="bi bi-person-fill" style="font-size: 3rem; color: #6c757d;"></i>
                            </div>
                            <img id="imagePreview" src="{{ session('user.profile_image_url', '') }}" alt="User Image" class="profile-image" style="display: none;">
                            <label for="profile_image" class="profile-edit-icon">
                                <i class="bi bi-pencil-fill"></i>
                            </label>
                        </div>
                        
                        <form action="/settings/update-profile-image" method="POST" enctype="multipart/form-data" class="mb-4">
                            @csrf
                            <input type="file" id="profile_image" name="profile_image" accept="image/*" class="d-none" onchange="previewImage(event)">
                        </form>

                        <form action="/settings/update-profile" method="POST" id="profileForm" class="row g-3">
                            @csrf
                            <div class="col-12">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ session('user.name', '') }}" required>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ session('user.email', '') }}" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-check-circle"></i> Update Profile
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Password Change Card -->
        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h3 class="mb-0"><i class="bi bi-shield-lock"></i> Ubah Password</h3>
                </div>
                <div class="card-body">
                    <form action="/settings/update-password" method="POST" class="row g-3">
                        @csrf
                        <div class="col-12">
                            <label for="old_password" class="form-label">Password Lama</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Masukkan password lama" required>
                                <button class="btn btn-outline-secondary" type="button" id="toggleOldPassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="new_password" class="form-label">Password Baru</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Masukkan password baru" required>
                                <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi password baru" required>
                                <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-shield-check"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; {{ date('Y') }} Admin Dashboard. All rights reserved.</p>
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

        // Profile image preview
        const profileImageInput = document.getElementById('profile_image');
        const imagePreview = document.getElementById('imagePreview');
        const profileIcon = document.getElementById('profileIcon');

        function previewImage(event) {
            if (event.target.files && event.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                    profileIcon.style.display = 'none';
                    
                    // Auto submit form after image selection
                    const form = profileImageInput.closest('form');
                    const formData = new FormData(form);
                    
                    fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        showNotification(data.message || 'Foto profile berhasil diperbarui', 'success');
                    })
                    .catch(error => {
                        showNotification('Gagal mengupdate foto profile', 'danger');
                    });
                }
                reader.readAsDataURL(event.target.files[0]);
            }
        }

        // Toggle password visibility
        const toggleOldPassword = document.getElementById('toggleOldPassword');
        const toggleNewPassword = document.getElementById('toggleNewPassword');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        
        toggleOldPassword.addEventListener('click', function() {
            togglePasswordVisibility('old_password', this);
        });
        
        toggleNewPassword.addEventListener('click', function() {
            togglePasswordVisibility('new_password', this);
        });
        
        toggleConfirmPassword.addEventListener('click', function() {
            togglePasswordVisibility('confirm_password', this);
        });
        
        function togglePasswordVisibility(fieldId, button) {
            const field = document.getElementById(fieldId);
            const icon = button.querySelector('i');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }

        // Form submission handlers
        const profileForm = document.getElementById('profileForm');
        const passwordForm = document.querySelector('form[action="/settings/update-password"]');
        
        profileForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            fetch(this.action, {
                method: 'POST',
                body: new FormData(this),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                showNotification(data.message || 'Profile berhasil diperbarui', 'success');
            })
            .catch(error => {
                showNotification('Gagal memperbarui profile', 'danger');
            });
        });
        
        passwordForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate password confirmation
            const newPassword = document.getElementById('new_password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            
            if (newPassword !== confirmPassword) {
                showNotification('Password baru dan konfirmasi password tidak cocok', 'danger');
                return;
            }
            
            fetch(this.action, {
                method: 'POST',
                body: new FormData(this),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                showNotification(data.message || 'Password berhasil diperbarui', 'success');
                // Reset form
                this.reset();
            })
            .catch(error => {
                showNotification('Gagal memperbarui password', 'danger');
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

        // Check if there's a profile image already
        if (imagePreview.src && imagePreview.src !== window.location.href) {
            imagePreview.style.display = 'block';
            profileIcon.style.display = 'none';
        }
    });
</script>

</body>
</html>