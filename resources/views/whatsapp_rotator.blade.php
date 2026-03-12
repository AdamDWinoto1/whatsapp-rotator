<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>WhatsApp Rotator - Admin Panel</title>
    
    <!-- Bootstrap & Icons -->
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
            --whatsapp-color: #25D366;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            font-size: 0.9rem;
        }

        /* Main Content */
        .main-content {
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

        .company-badge {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .company-badge i {
            margin-right: 8px;
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

        /* WhatsApp Rotator Link */
        .rotator-link-container {
            background: linear-gradient(135deg, var(--whatsapp-color) 0%, #128C7E 100%);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
            color: white;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.2);
        }

        .rotator-link-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .rotator-link-title i {
            margin-right: 10px;
            font-size: 1.5rem;
        }

        .rotator-link-box {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .rotator-link {
            color: white;
            font-weight: 500;
            word-break: break-all;
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

        /* Status Badge */
        .status-badge {
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-aktif {
            background-color: rgba(25, 135, 84, 0.15);
            color: var(--success-color);
        }

        .status-tidak-aktif {
            background-color: rgba(220, 53, 69, 0.15);
            color: var(--danger-color);
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

        .btn-warning {
            background-color: var(--warning-color);
            border: none;
            color: var(--dark-color);
        }

        .btn-warning:hover {
            background-color: #e0a800;
            transform: translateY(-2px);
        }

        .btn-whatsapp {
            background-color: var(--whatsapp-color);
            border: none;
            color: white;
        }

        .btn-whatsapp:hover {
            background-color: #1da851;
            transform: translateY(-2px);
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

        /* Modal Styles */
        .modal-content {
            border-radius: 10px;
            border: none;
        }

        .modal-header {
            border-bottom: 1px solid #eee;
            padding: 15px 20px;
        }

        .modal-body {
            padding: 20px;
        }

        /* Mobile Card View */
        .mobile-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 1.25rem;
            margin-bottom: 1rem;
            border-left: 4px solid var(--primary-color);
            transition: transform 0.3s;
        }

        .mobile-card:hover {
            transform: translateY(-3px);
        }

        .mobile-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.75rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #eee;
        }

        .mobile-card-title {
            font-weight: 600;
            margin: 0;
            color: var(--dark-color);
        }

        .mobile-card-body {
            margin-bottom: 1rem;
        }

        .mobile-card-row {
            display: flex;
            margin-bottom: 0.5rem;
        }

        .mobile-card-label {
            font-weight: 500;
            width: 120px;
            color: #6c757d;
        }

        .mobile-card-value {
            flex: 1;
        }

        .mobile-card-actions {
            display: flex;
            gap: 0.5rem;
        }

        /* Notification Styles */
        .notification-toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 8px;
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

        .notification-toast.warning {
            background-color: var(--warning-color);
            color: var(--dark-color);
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .desktop-view {
                display: none;
            }

            .mobile-view {
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

        @media (min-width: 769px) {
            .mobile-view {
                display: none;
            }

            .desktop-view {
                display: block;
            }
        }

        /* Add New Row Styles */
        .add-new-row {
            background-color: rgba(13, 110, 253, 0.05);
        }

        .add-new-row td {
            padding: 1rem;
        }

        /* Stats Cards */
        .stats-card {
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            color: white;
            transition: all 0.3s;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
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
        }

        .stats-card i {
            font-size: 2.5rem;
            opacity: 0.8;
        }

        .stats-value {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 10px 0;
        }

        /* Footer */
        .footer {
            margin-top: 30px;
            padding: 15px 0;
            text-align: center;
            color: #6c757d;
            font-size: 0.85rem;
        }
    </style>
</head>

<body>
    <!-- Main Content -->
    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                <div>
                    <h1 class="h2 mb-0">WhatsApp Rotator</h1>
                    <p class="mb-0 opacity-75">Kelola nomor WhatsApp untuk perusahaan</p>
                </div>
                <div class="company-badge">
                    <i class="bi bi-building"></i> {{ ucfirst(str_replace('-', ' ', $company)) }}
                </div>
            </div>
        </div>

        <!-- WhatsApp Rotator Link -->
        <div class="rotator-link-container">
            <div class="rotator-link-title">
                <i class="bi bi-whatsapp"></i> Link WhatsApp Rotator
            </div>
            <div class="rotator-link-box">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="rotator-link">{{ url('/whatsapp-rotator/' . $company . '/next') }}</div>
                    <button class="btn btn-light copy-rotator-link" data-link="{{ url('/whatsapp-rotator/' . $company . '/next') }}">
                        <i class="bi bi-clipboard"></i> Salin
                    </button>
                </div>
            </div>
            <p class="mb-0">Bagikan link ini kepada pelanggan. Setiap klik akan mengarahkan ke nomor WhatsApp yang berbeda secara bergantian.</p>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="stats-card primary">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50">Total Nomor</h6>
                            <h3 class="text-white mb-0">{{ count($rotatorData) }}</h3>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-telephone-fill text-white" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card success">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50">Aktif</h6>
                            <h3 class="text-white mb-0">{{ count($rotatorData->where('status', 'Aktif')) }}</h3>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-check-circle-fill text-white" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card danger">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50">Tidak Aktif</h6>
                            <h3 class="text-white mb-0">{{ count($rotatorData->where('status', 'Tidak Aktif')) }}</h3>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-x-circle-fill text-white" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stats-card warning">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50">Link Rotator</h6>
                            <h3 class="text-white mb-0">1</h3>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-link-45deg text-white" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Desktop View (Table) -->
        <div class="desktop-view">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0"><i class="bi bi-list-ul"></i> Data WhatsApp Rotator</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="rotatorTable">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="25%">Nomor WhatsApp</th>
                                    <th width="25%">Nama Pengguna</th>
                                    <th width="20%">Status Aktif</th>
                                    <th width="25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rotatorData as $index => $item)
                                <tr data-id="{{ $item->id }}" class="view-mode">
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <span class="view-text nomor">{{ $item->nomor }}</span>
                                        <input type="text" name="nomor" class="form-control" value="{{ $item->nomor }}" style="display:none;" required>
                                    </td>
                                    <td>
                                        <span class="view-text nama">{{ $item->nama }}</span>
                                        <input type="text" name="nama" class="form-control" value="{{ $item->nama }}" style="display:none;" required>
                                    </td>
                                    <td>
                                        <span class="view-text status">
                                            @if ($item->status == 'Aktif')
                                                <span class="status-badge status-aktif">Aktif</span>
                                            @else
                                                <span class="status-badge status-tidak-aktif">Tidak Aktif</span>
                                            @endif
                                        </span>
                                        <select name="status" class="form-select" style="display:none;" required>
                                            <option value="Aktif" {{ $item->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                            <option value="Tidak Aktif" {{ $item->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                        </select>
                                    </td>
                                    <td>
                                        <!-- Edit Button -->
                                        <button type="button" class="btn btn-primary btn-sm edit-btn" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <!-- Delete Form -->
                                        <form action="{{ route('whatsapp.rotator.delete', ['company' => $company, 'id' => $item->id]) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- Add New Row -->
                                <tr class="add-new-row">
                                    <form action="{{ route('whatsapp.rotator.store', ['company' => $company]) }}" method="POST">
                                        @csrf
                                        <td><i class="bi bi-plus-circle-fill text-primary"></i></td>
                                        <td>
                                            <input type="text" name="nomor" class="form-control" placeholder="Nomor WhatsApp" required>
                                        </td>
                                        <td>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" required>
                                        </td>
                                        <td>
                                            <select name="status" class="form-select" required>
                                                <option value="Aktif" selected>Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="bi bi-plus-lg"></i> Tambah
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile View (Cards) -->
        <div class="mobile-view">
            @foreach ($rotatorData as $index => $item)
            <div class="mobile-card" data-id="{{ $item->id }}">
                <div class="mobile-card-header">
                    <h5 class="mobile-card-title">{{ $item->nama }}</h5>
                    @if ($item->status == 'Aktif')
                        <span class="status-badge status-aktif">Aktif</span>
                    @else
                        <span class="status-badge status-tidak-aktif">Tidak Aktif</span>
                    @endif
                </div>
                <div class="mobile-card-body">
                    <div class="mobile-card-row">
                        <div class="mobile-card-label">Nomor:</div>
                        <div class="mobile-card-value nomor-view">{{ $item->nomor }}</div>
                        <input type="text" name="nomor" class="form-control nomor-edit" value="{{ $item->nomor }}" style="display:none;" required>
                    </div>
                    <div class="mobile-card-row">
                        <div class="mobile-card-label">Nama:</div>
                        <div class="mobile-card-value nama-view">{{ $item->nama }}</div>
                        <input type="text" name="nama" class="form-control nama-edit" value="{{ $item->nama }}" style="display:none;" required>
                    </div>
                    <div class="mobile-card-row">
                        <div class="mobile-card-label">Status:</div>
                        <div class="mobile-card-value status-view">
                            @if ($item->status == 'Aktif')
                                <span class="status-badge status-aktif">Aktif</span>
                            @else
                                <span class="status-badge status-tidak-aktif">Tidak Aktif</span>
                            @endif
                        </div>
                        <select name="status" class="form-select status-edit" style="display:none;" required>
                            <option value="Aktif" {{ $item->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Tidak Aktif" {{ $item->status == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="mobile-card-actions">
                    <button type="button" class="btn btn-primary btn-sm edit-btn">
                        <i class="bi bi-pencil"></i> Edit
                    </button>
                    <form action="{{ route('whatsapp.rotator.delete', ['company' => $company, 'id' => $item->id]) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
            
            <!-- Add New Card -->
            <div class="mobile-card">
                <div class="mobile-card-header">
                    <h5 class="mobile-card-title">
                        <i class="bi bi-plus-circle-fill text-primary"></i> Tambah Nomor Baru
                    </h5>
                </div>
                <form action="{{ route('whatsapp.rotator.store', ['company' => $company]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nomor" class="form-label">Nomor WhatsApp</label>
                        <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Masukkan nomor WhatsApp" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pengguna</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama pengguna" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="Aktif" selected>Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-plus-lg"></i> Tambah Nomor
                    </button>
                </form>
            </div>
        </div>

        <!-- Back Button -->
        <div class="text-center mt-4">
            <a href="/perusahaan" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali ke Perusahaan
            </a>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} Admin Dashboard. All rights reserved.</p>
        </div>
    </div>

    <!-- Modals -->
    <!-- Warning Modal -->
    <div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="warningLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="warningLabel">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Peringatan
                    </h5>
                    <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    {{ session('error') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Popup Sukses -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-body py-3">
        <p class="mb-0 text-success fw-bold">✅ Nomor WhatsApp berhasil ditambahkan!</p>
      </div>
    </div>
  </div>
</div>



    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="successLabel">
                        <i class="bi bi-check-circle-fill me-2"></i> Berhasil
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification Container -->
    <div id="notificationContainer"></div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Copy rotator link functionality
            const copyRotatorLinkBtn = document.querySelector('.copy-rotator-link');
            if (copyRotatorLinkBtn) {
                copyRotatorLinkBtn.addEventListener('click', function() {
                    const link = this.getAttribute('data-link');
                    navigator.clipboard.writeText(link).then(() => {
                        showNotification('Link WhatsApp Rotator telah disalin!', 'success');
                    }).catch(err => {
                        showNotification('Gagal menyalin link: ' + err, 'danger');
                    });
                });
            }

            // Show modals based on session messages
            @if(session('error'))
                const warningModal = new bootstrap.Modal(document.getElementById('warningModal'));
                warningModal.show();
            @endif

            @if(session('success'))
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            @endif

            // Desktop table edit functionality
            const table = document.getElementById('rotatorTable');
            if (table) {
                let editingRow = null;
                let originalData = {};

                table.addEventListener('click', function(event) {
                    if (event.target.closest('button.edit-btn')) {
                        const row = event.target.closest('tr');
                        if (editingRow && editingRow !== row) {
                            showNotification('Selesaikan edit baris yang sedang aktif terlebih dahulu.', 'warning');
                            return;
                        }
                        if (row.classList.contains('edit-mode')) {
                            return;
                        }
                        
                        editingRow = row;
                        originalData = {
                            nomor: row.querySelector('input[name="nomor"]').value,
                            nama: row.querySelector('input[name="nama"]').value,
                            status: row.querySelector('select[name="status"]').value,
                        };
                        
                        row.classList.remove('view-mode');
                        row.classList.add('edit-mode');
                        toggleRowInputs(row, true);
                        renderActionButtons(row, true);
                    }
                });

                function toggleRowInputs(row, editing) {
                    if (editing) {
                        row.querySelectorAll('input, select').forEach(el => el.style.display = 'inline-block');
                        row.querySelectorAll('.view-text').forEach(el => el.style.display = 'none');
                    } else {
                        row.querySelectorAll('input, select').forEach(el => el.style.display = 'none');
                        row.querySelectorAll('.view-text').forEach(el => el.style.display = 'inline-block');
                    }
                }

                function renderActionButtons(row, editing) {
                    const actionCell = row.querySelector('td:last-child');
                    actionCell.innerHTML = '';

                    if (editing) {
                        // Create Save Button
                        const saveBtn = document.createElement('button');
                        saveBtn.className = 'btn btn-success btn-sm me-1';
                        saveBtn.title = 'Simpan';
                        saveBtn.innerHTML = '<i class="bi bi-check-lg"></i>';
                        saveBtn.addEventListener('click', function() {
                            submitEditForm(row);
                        });
                        actionCell.appendChild(saveBtn);

                        // Create Cancel Button
                        const cancelBtn = document.createElement('button');
                        cancelBtn.className = 'btn btn-secondary btn-sm';
                        cancelBtn.title = 'Batal';
                        cancelBtn.innerHTML = '<i class="bi bi-x-lg"></i>';
                        cancelBtn.addEventListener('click', function() {
                            cancelEdit(row);
                        });
                        actionCell.appendChild(cancelBtn);
                    } else {
                        // Create Edit Button
                        const editBtn = document.createElement('button');
                        editBtn.className = 'btn btn-primary btn-sm me-1 edit-btn';
                        editBtn.title = 'Edit';
                        editBtn.innerHTML = '<i class="bi bi-pencil"></i>';
                        actionCell.appendChild(editBtn);

                        // Create Delete Form and Button
                        const deleteForm = document.createElement('form');
                        deleteForm.action = '{{ route("whatsapp.rotator.delete", ["company" => $company, "id" => "__ID__"]) }}'.replace('__ID__', row.getAttribute('data-id'));
                        deleteForm.method = 'POST';
                        deleteForm.style.display = 'inline-block';
                        deleteForm.innerHTML = '@csrf @method("DELETE")';
                        const deleteBtn = document.createElement('button');
                        deleteBtn.type = 'submit';
                        deleteBtn.className = 'btn btn-danger btn-sm';
                        deleteBtn.title = 'Hapus';
                        deleteBtn.innerHTML = '<i class="bi bi-trash"></i>';
                        deleteForm.appendChild(deleteBtn);
                        actionCell.appendChild(deleteForm);
                    }
                }

                function submitEditForm(row) {
                    const id = row.getAttribute('data-id');
                    const nomor = row.querySelector('input[name="nomor"]').value;
                    const nama = row.querySelector('input[name="nama"]').value;
                    const status = row.querySelector('select[name="status"]').value;

                    const formData = new FormData();
                    formData.append('_token', '{{ csrf_token() }}');
                    formData.append('_method', 'PUT');
                    formData.append('nomor', nomor);
                    formData.append('nama', nama);
                    formData.append('status', status);

                    fetch(`/whatsapp-rotator/{{ $company }}/${id}`, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'Accept': 'application/json',
                        },
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Terjadi kesalahan saat menyimpan data');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Update the row with the new data
                        row.querySelector('.view-text.nomor').textContent = data.nomor;
                        row.querySelector('.view-text.nama').textContent = data.nama;
                        
                        // Update status badge
                        const statusElement = row.querySelector('.view-text.status');
                        if (data.status === 'Aktif') {
                            statusElement.innerHTML = '<span class="status-badge status-aktif">Aktif</span>';
                        } else {
                            statusElement.innerHTML = '<span class="status-badge status-tidak-aktif">Tidak Aktif</span>';
                        }

                        // Switch back to view mode
                        row.classList.remove('edit-mode');
                        row.classList.add('view-mode');
                        toggleRowInputs(row, false);
                        renderActionButtons(row, false);

                        // Reset editingRow and originalData after successful save
                        editingRow = null;
                        originalData = {};
                        
                        // Show success notification
                        showNotification('Data berhasil diperbarui!', 'success');
                    })
                    .catch(error => {
                        showNotification(error.message, 'danger');
                    });
                }

                function cancelEdit(row) {
                    row.querySelector('input[name="nomor"]').value = originalData.nomor;
                    row.querySelector('input[name="nama"]').value = originalData.nama;
                    row.querySelector('select[name="status"]').value = originalData.status;
                    row.classList.remove('edit-mode');
                    row.classList.add('view-mode');
                    toggleRowInputs(row, false);
                    renderActionButtons(row, false);
                    editingRow = null;
                    originalData = {};
                }
            }
            
            // Mobile card edit functionality
            const mobileEditBtns = document.querySelectorAll('.mobile-view .edit-btn');
            
            mobileEditBtns.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const card = this.closest('.mobile-card');
                    const isEditing = card.classList.contains('edit-mode');
                    
                    if (isEditing) {
                        // Save changes
                        const id = card.getAttribute('data-id');
                        const nomor = card.querySelector('.nomor-edit').value;
                        const nama = card.querySelector('.nama-edit').value;
                        const status = card.querySelector('.status-edit').value;
                        
                        const formData = new FormData();
                        formData.append('_token', '{{ csrf_token() }}');
                        formData.append('_method', 'PUT');
                        formData.append('nomor', nomor);
                        formData.append('nama', nama);
                        formData.append('status', status);
                        
                        fetch(`/whatsapp-rotator/{{ $company }}/${id}`, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'Accept': 'application/json',
                            },
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Terjadi kesalahan saat menyimpan data');
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Update the card with the new data
                            card.querySelector('.nomor-view').textContent = data.nomor;
                            card.querySelector('.nama-view').textContent = data.nama;
                            
                            // Update status badge
                            const statusElement = card.querySelector('.status-view');
                            if (data.status === 'Aktif') {
                                statusElement.innerHTML = '<span class="status-badge status-aktif">Aktif</span>';
                            } else {
                                statusElement.innerHTML = '<span class="status-badge status-tidak-aktif">Tidak Aktif</span>';
                            }
                            
                            // Switch back to view mode
                            card.classList.remove('edit-mode');
                            card.querySelector('.nomor-view').style.display = 'block';
                            card.querySelector('.nama-view').style.display = 'block';
                            card.querySelector('.status-view').style.display = 'block';
                            card.querySelector('.nomor-edit').style.display = 'none';
                            card.querySelector('.nama-edit').style.display = 'none';
                            card.querySelector('.status-edit').style.display = 'none';
                            
                            // Change button text
                            this.innerHTML = '<i class="bi bi-pencil"></i> Edit';
                            
                            // Show success notification
                            showNotification('Data berhasil diperbarui!', 'success');
                        })
                        .catch(error => {
                            showNotification(error.message, 'danger');
                        });
                    } else {
                        // Switch to edit mode
                        card.classList.add('edit-mode');
                        card.querySelector('.nomor-view').style.display = 'none';
                        card.querySelector('.nama-view').style.display = 'none';
                        card.querySelector('.status-view').style.display = 'none';
                        card.querySelector('.nomor-edit').style.display = 'block';
                        card.querySelector('.nama-edit').style.display = 'block';
                        card.querySelector('.status-edit').style.display = 'block';
                        
                        // Change button text
                        this.innerHTML = '<i class="bi bi-check-lg"></i> Simpan';
                    }
                });
            });
            
            // Notification function
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
                else if (type === 'warning') icon = 'bi-exclamation-triangle-fill';
                
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
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Jika ada pesan sukses, tampilkan modal lalu tutup otomatis
    @if(session('success'))
        const successModalEl = document.getElementById('successModal');
        const successModal = new bootstrap.Modal(successModalEl);
        successModal.show();

        // Tutup otomatis setelah 4 detik
        setTimeout(() => {
            successModal.hide();
        }, 1500);

        // Saat modal selesai ditutup (selesai animasi fade), hapus backdrop & kunci scroll
        successModalEl.addEventListener('hidden.bs.modal', () => {
            document.body.classList.remove('modal-open');
            document.body.style.overflow = 'auto';
            document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
        });
    @endif

    // Jika ada pesan error
    @if(session('error'))
        const warningModal = new bootstrap.Modal(document.getElementById('warningModal'));
        warningModal.show();
    @endif
});
</script>
    
</body>
</html>