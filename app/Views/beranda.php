<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="container">
    .
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-uppercase text-center">Selamat Datang</h2>
        </div>
    </div>
    <div class="card mt-2 mb-3">
        <div class="card-body">

            <div class="row">

                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title">Kecamatan</h3>
                            <h5 class="card-text"><?= count($listKecamatan) ?> <i class="fa-solid fa-map"></i></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title">Kelurahan</h3>
                            <h5 class="card-text"><?= count($listKelurahan) ?> <i class="fa-solid fa-map-location"></i></h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title">Kejadian</h3>
                            <h5 class="card-text"><?= count($listKejadian) ?> <i class="fa-solid fa-map-pin"></i></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title">Petugas</h3>
                            <h5 class="card-text"><?= count($listPetugas) ?> <i class="fa-solid fa-people-group"></i></h5>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>


</div>
<?= $this->endSection() ?>