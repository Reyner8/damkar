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
        </div>
    </div>
    <div class="row">
        <!-- forms -->
        <div class="col-md-4">
            <?php if (!$isEdit) : ?>
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title">Forms</h5>
                        <form action="/admin/kelurahan" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama " class="form-label">Nama</label>
                                <input id="nama" type="text" class="form-control" name="nama" placeholder="Nama Kelurahan ..." value="<?= old('nama') ?>">
                                <p class="text-danger"><?= $validation->getError('nama') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <select name="idKecamatan" id="idKecamatan" class="form-control">
                                    <?php foreach ($listKecamatan as $kecamatan) : ?>
                                        <option value="<?= $kecamatan['id'] ?>"><?= $kecamatan['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            <?php else : ?>
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title">Forms Update</h5>
                        <form action="/admin/kelurahan/edit/<?= $dataEdit['id'] ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input id="nama" type="text" class="form-control" name="nama" placeholder="Nama kelurahan..." value="<?= old('nama') ? old('nama') : $dataEdit['nama'] ?>">
                                <p class="text-danger"><?= $validation->getError('nama') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <select name="idKecamatan" id="idKecamatan" class="form-control">
                                    <?php foreach ($listKecamatan as $kecamatan) : ?>
                                        <?php if ($kecamatan['id'] == $dataEdit['idKecamatan']) : ?>
                                            <option value="<?= $kecamatan['id'] ?>" selected><?= $kecamatan['nama'] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $kecamatan['id'] ?>"><?= $kecamatan['nama'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
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
                                <th>Nama Kelurahan</th>
                                <th>Nama Kecamatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listKelurahan as $kelurahan) : ?>
                                <tr>
                                    <td><?= $kelurahan['nama'] ?></td>
                                    <td><?= $kelurahan['namaKecamatan'] ?></td>
                                    <td>
                                        <a class="btn btn-outline-warning btn-sm" href="/admin/kelurahan/edit/<?= $kelurahan['id'] ?>"><i class="fa fa-pencil"></i></a>

                                        <form class="d-inline-block" action="/admin/kelurahan/<?= $kelurahan['id'] ?>" method="post">
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