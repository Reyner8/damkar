<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="card mt-5 mb-3">
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Peta Lokasi Kejadian</h4>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    <div class="card mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="maps" id="maps" style="height: 500px; width: 100%;"></div>
                    </div>
                </div>

                <div class="col-md-4">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="search-box py-4 px-3">
                                <div class="col-md-12 text-center">
                                    <h5>Cari Kelurahan</h5>
                                </div>
                                <div id="kelurahan" class="col-md-12">
                                    <div class="form-group">
                                        <select id="kategori" name="kategori" class="form-control">
                                            <option value="0" selected>-- Kelurahan --</option>
                                            <?php foreach ($listKelurahan as $kelurahan) : ?>
                                                <option value="<?= $kelurahan['id'] ?>"><?= $kelurahan['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3 d-flex justify-content-center">
                                    <button id="search" class="btn btn-search">Search</button>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 py-4">
                            <div id="direction-box" class="direction-box">

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
<?= $this->endSection() ?>