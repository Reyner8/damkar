<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="container">

    <div class="row mt-5 my-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <h3>Regu <?= $listPenugasan[0]['namaRegu'] ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-5">
            <div class="card mb-5">
                <div class="card-body">
                    <h5 class="card-title text-uppercase">Lokasi Kejadian</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th>Kelurahan</th>
                            <td>:</td>
                            <td><?= $kejadian['namaKelurahan'] ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>:</td>
                            <td><?= $kejadian['alamat'] ?></td>
                        </tr>
                        <tr>
                            <th>Penyebab</th>
                            <td>:</td>
                            <td><?= $kejadian['penyebab'] ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>:</td>
                            <td><?= $kejadian['tanggal'] ?></td>
                        </tr>
                        <tr>
                            <th>Jam Lapor</th>
                            <td>:</td>
                            <td><?= $kejadian['jamLapor'] ?></td>
                        </tr>
                        <tr>
                            <th>Jam Tanggap</th>
                            <td>:</td>
                            <td><?= $kejadian['jamTanggap'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Petugas</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Kontak</th>
                        </tr>
                        <?php foreach ($listPenugasan as $petugas) : ?>
                            <tr>
                                <td><?= $petugas['namaPetugas'] ?></td>
                                <td><?= $petugas['namaJabatan'] ?></td>
                                <td><?= $petugas['nomorHp'] ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Dokumentasi</h5>
                    <div class="row">
                        <?php foreach ($listDokumentasi as $dokumentasi) : ?>
                            <div class="col-md-3">
                                <img src="/assets/uploads/galeri/<?= $dokumentasi['file'] ?>" class="img-thumbnail" alt="<?= $dokumentasi['file'] ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>