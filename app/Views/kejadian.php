<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="container">

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-uppercase text-center">Data Kejadian</h3>
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
                                <th>Alamat</th>
                                <th>Kelurahan</th>
                                <th>lat - lng</th>
                                <th>penyebab</th>
                                <th>tanggal</th>
                                <th>jam lapor</th>
                                <th>jam tanggap</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listKejadian as $kejadian) : ?>
                                <tr>
                                    <td><?= $kejadian['alamat'] ?></td>
                                    <td><?= $kejadian['namaKelurahan'] ?></td>
                                    <td><?= $kejadian['latitude'] . ' - ' . $kejadian['longitude'] ?></td>
                                    <td><?= $kejadian['penyebab'] ?></td>
                                    <td><?= $kejadian['tanggal'] ?></td>
                                    <td><?= $kejadian['jamLapor'] ?></td>
                                    <td><?= $kejadian['jamTanggap'] ?></td>
                                    <td>
                                        <a class="btn btn-outline-info btn-sm" href="/kejadian/lokasi/<?= $kejadian['id'] ?>"><i class="fa fa-info"></i></a>
                                    </td>
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