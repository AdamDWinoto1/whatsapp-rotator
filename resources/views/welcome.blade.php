<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WhatsApp Rotator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">WhatsApp Rotator</a>
      <div class="d-flex">
        <a href="/dashboard" class="btn btn-outline-light">Dashboard</a>
      </div>
    </div>
  </nav>

  <!-- Konten -->
  <div class="container mt-5">
    <div class="card shadow p-4">
      <h2 class="text-center">Halaman WhatsApp Rotator</h2>
      <p class="text-center">Di sini kamu bisa mengatur nomor WhatsApp untuk rotator.</p>

      <!-- Form Input Nomor WhatsApp -->
      <form>
        <div class="mb-3">
          <label for="waNumber" class="form-label">Nomor WhatsApp</label>
          <input type="text" class="form-control" id="waNumber" placeholder="+62xxx">
        </div>
        <div class="mb-3">
          <label for="desc" class="form-label">Keterangan</label>
          <input type="text" class="form-control" id="desc" placeholder="Contoh: Admin 1">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
      </form>

      <!-- Tabel Nomor yang sudah ditambahkan -->
      <div class="mt-5">
        <h5>Daftar Nomor WhatsApp</h5>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Nomor</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>+628123456789</td>
              <td>Admin 1</td>
              <td>
                <button class="btn btn-warning btn-sm">Edit</button>
                <button class="btn btn-danger btn-sm">Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>

</body>
</html>
