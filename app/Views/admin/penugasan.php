<?= $this->extend('admin/layouts/default') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <?php if (session()->getFlashdata('msg-danger')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('msg-danger') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('msg-success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('msg-success') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('msg-dabger')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('msg-danger') ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <!-- forms -->
        <div class="col-md-4">
            <?php if (!$isEdit) : ?>
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title">Forms</h5>
                        <div class="form-inline">
                            <div class="form-group mb-2">
                                <input type="number" id="number" class="form-control" placeholder="Banyaknya anggota...">
                            </div>
                            <button id="validate-btn" class="btn btn-outline-info btn-sm">Validate</button>
                        </div>
                        <form action="/admin/kejadian/penugasan/<?= $kejadian['id'] ?>" method="post" enctype="multipart/form-data">
                            <hr>
                            <div class="mb-4">
                                <label for="regu">Regu</label>
                                <select name="idRegu" id="regu" class="form-control">
                                    <?php foreach($listRegu as $regu): ?>
                                        <option value="<?= $regu['id']  ?>"><?= $regu['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="tanggal">Tanggal Penugasan</label>
                                <input type="date" class="form-control" name="tanggalPenugasan" placeholder="Tanggal penugasan ...">
                            </div>
                            <div id="petugas-container" class="mb-4">
                                <label for="petugas">Petugas</label>
                                <select class="form-control mb-2" name="idPetugas[]" id="petugas">
                                    <?php foreach ($listPetugas as $petugas) : ?>
                                        <option value="<?= $petugas['id'] ?>"><?= $petugas['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            <?php else : ?>
            <?php endif; ?>
        </div>

        <!-- table -->
        <div class="col-md-8">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <h5 class="card-title">Data</h5>
                    <table id="datatable" class="display table border-dark">
                        <thead class="text-center">
                            <tr>
                                <th>Nama Petugas</th>
                                <th>Regu</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($listPenugasan as $penugasan) : ?>
                                <tr>
                                    <td><?= $penugasan['namaPetugas'] ?></td>
                                    <td><?= $penugasan['namaRegu'] ?></td>
                                    <td><?= $penugasan['tanggalPenugasan'] ?></td>
                                    <td> 
                                        <form class="d-inline-block" action="/admin/kejadian/penugasan/<?= $penugasan['id'] ?>" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
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