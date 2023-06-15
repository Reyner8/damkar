<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="container">

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-uppercase text-center">Data Petugas</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <!-- table -->
        <div class="col-md-12">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <h5 class="card-title">Data</h5>
                    <table id="datatable" class="display table border-dark">
                        <thead class="text-center">
                            <tr>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>JK</th>
                                <th>TTL</th>
                                <th>Agama</th>
                                <th>Nomor HP</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listPetugas as $petugas) : ?>
                                <tr>
                                    <td><?= $petugas['alamat'] ?></td>
                                    <td><?= $petugas['namaJabatan'] ?></td>
                                    <td><?= ($petugas['jenisKelamin'] == 'P') ? 'Pria' : 'Wanita' ?></td>
                                    <td><?= $petugas['tempatLahir'] . ', ' . $petugas['tanggalLahir'] ?></td>
                                    <td><?= $petugas['agama'] ?></td>
                                    <td><?= $petugas['alamat'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>