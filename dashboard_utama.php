<?php
$activePage = 'letters';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Dinas</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>

<aside class="sidebar">
    <?php include 'dashboard_menu.php'; ?> 
</aside>

<main class="container-limit">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="text-center mb-4">Form Pembuatan Surat Dinas</h3>

        <form action="proses_simpan.php" method="POST">

            <label class="fw-bold">Nama Peserta & Jabatan</label>
            <div id="pesertaWrapper">

                <div class="row g-2 mb-2 pesertaRow">
                    <div class="col-md-6">
                        <input type="text" name="nama1[]" class="form-control" placeholder="Nama Peserta" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="jabatan[]" class="form-control" placeholder="Jabatan" required>
                    </div>
                </div>

            </div>

            <p class="text-primary" style="cursor:pointer" onclick="tambahPeserta()">➕ Tambahkan Peserta</p>

            <div class="mb-3">
                <label class="fw-bold">Lokasi Dinas</label>
                <input type="text" name="lokasi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="fw-bold">Tanggal Mulai Dinas</label>
                <input type="date" name="tanggal_lahir" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="fw-bold">Tanggal Selesai Dinas</label>
                <input type="date" name="tanggal_selesai" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="fw-bold">Tanggal Surat</label>
                <input type="date" name="tanggal_mulai" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="fw-bold">Nomor Surat</label>
                <input type="text" name="nomor_surat" class="form-control" required>
            </div>

            <label class="fw-bold">Dasar</label>
            <div id="dasarWrapper">
                <input type="text" name="dasar[]" class="form-control mb-2" placeholder="Dasar" required>
            </div>
            <p class="text-primary" style="cursor:pointer" onclick="tambahDasar()">➕ Tambahkan Dasar</p>

            <label class="fw-bold">Lampiran Tugas</label>
            <div id="lampiranWrapper">
                <input type="text" name="lampiran[]" class="form-control mb-2" placeholder="Lampiran Tugas" required>
            </div>
            <p class="text-primary" style="cursor:pointer" onclick="tambahLampiran()">➕ Tambahkan Lampiran</p>

            <button type="submit" class="btn btn-primary w-100 mt-3">Simpan Data</button>

        </form>
    </div>
</div>

</main>

<script>
function tambahPeserta() {
    const wrapper = document.getElementById('pesertaWrapper');

    const html = `
        <div class="row g-2 mb-2 pesertaRow">
            <div class="col-md-6">
                <input type="text" name="nama1[]" class="form-control" placeholder="Nama Peserta" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="jabatan[]" class="form-control" placeholder="Jabatan" required>
            </div>
        </div>
    `;

    wrapper.insertAdjacentHTML('beforeend', html);
}

function tambahDasar() {
    const wrapper = document.getElementById('dasarWrapper');
    wrapper.insertAdjacentHTML('beforeend',
        `<input type="text" name="dasar[]" class="form-control mb-2" placeholder="Dasar" required>`
    );
}

function tambahLampiran() {
    const wrapper = document.getElementById('lampiranWrapper');
    wrapper.insertAdjacentHTML('beforeend',
        `<input type="text" name="lampiran[]" class="form-control mb-2" placeholder="Lampiran Tugas" required>`
    );
}
</script>

</body>
</html>
