<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - Template</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index_styles.css">
</head>

<body>
    <aside class="sidebar">
        <div class="logo px-3">DASHBOARD PEMBUATAN SURAT</div>

        <nav class="nav flex-column px-2">

            <a class="nav-link <?= ($activePage == 'letters') ? 'active' : '' ?>"
                href="dashboard_utama.php">
                <i class="fa-regular fa-chart-bar me-2"></i>Buat Surat            </a>

            <a class="nav-link <?= ($activePage == 'history') ? 'active' : '' ?>"
                href="dashboard_riwayat.php">
                <i class="fa-solid fa-file me-2"></i>Riwayat Surat
            </a>

        </nav>
    </aside>
</body>
</html>