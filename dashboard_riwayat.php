<?php
$activePage = 'history';
?>
<!Doctype html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Laporan Pegawai | Pelaporan SOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index_styles.css">
</head>
<body>
    <aside class="sidebar">
        <?php include 'dashboard_menu.php'; ?>
    </aside>

    <main class="container-limit">
        <div class="topbar">
            <div>
                <h5 class="mb-1">LAPORAN</h5> <small class="text-white-50">Daftar laporan yang telah Anda kirimkan.</small>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="search">
                    <input class="form-control" placeholder="Search here..." />
                </div>
                <img src="https://i.pravatar.cc/40" class="rounded-circle" alt="user">
            </div>
        </div>

        <div class="d-flex justify-content-start mb-4">
            <a href="employee_add_report.php" class="btn btn-primary btn-lg shadow-sm px-4">
                <i class="fa-solid fa-plus me-2"></i> Tambahkan Laporan
            </a>
        </div>
        
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success mt-3"><?= htmlspecialchars($_GET['success']); ?></div>
        <?php endif; ?>

        <div class="table-card mb-5">
            <h6 class="mb-3">Tabel Laporan</h6>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="text-muted small">
                        <tr>
                            <th>Jenis SOP</th>
                            <th>Gambar</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Timestamp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) { 
                                // Tentukan badge class berdasarkan status
                                $badge_class = 'bg-warning text-dark';
                                if ($row['status'] == 'approved') {
                                    $badge_class = 'bg-success';
                                } elseif ($row['status'] == 'rejected') {
                                    $badge_class = 'bg-danger';
                                }
                        ?>
                        <tr>
                            <td>
                                <div class="project">
                                    <div class="fw-bold"><?= htmlspecialchars($row['jenis_sop']); ?></div>
                                </div>
                            </td>
                            <td>
                                <div class="gambar">
                                    <?php if ($row['gambar']): ?>
                                        <img src="<?= $image_path_dir . htmlspecialchars($row['gambar']); ?>" alt="Bukti Laporan" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                    <?php else: ?>
                                        <span class="text-muted">Tidak Ada</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td>
                                <div class="text">
                                    <p title="<?= htmlspecialchars($row['keterangan']); ?>"><?= htmlspecialchars(substr($row['keterangan'], 0, 50)) . '...'; ?></p>
                                </div>
                            </td>
                            <td>
                                <div class="status">
                                    <span class="badge <?= $badge_class; ?>"><?= htmlspecialchars($row['status']); ?></span>
                                </div>
                            </td>
                            <td>
                                <?= date('d-m-Y H:i:s', strtotime($row['timestamp'])); ?> 
                            </td>
                            <td>
                                <div class="button d-flex gap-2">
                                    <a href="employee_update_report.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                                    <a href="delete_report_action.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus laporan ini?');"> <i class="fa-solid fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php 
                            } // End while loop
                        } else {
                            // Tampilkan jika tidak ada data
                            echo '<tr><td colspan="6" class="text-center text-muted">Belum ada laporan yang Anda buat.</td></tr>';
                        }
                        // Tutup koneksi database
                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    <footer class="mt-5 text-center text-muted small">Copyright © 2025 Creative Tim | Distributed by ThemeWagon</footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>