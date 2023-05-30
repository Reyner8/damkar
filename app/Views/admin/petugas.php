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
                        <form action="/admin/petugas" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <select name="idJabatan" id="jabatan" class="form-control">
                                    <?php foreach ($listJabatan as $jabatan) : ?>
                                        <option value="<?= $jabatan['id'] ?>"><?= $jabatan['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama " class="form-label">Nama</label>
                                <input id="nama" type="text" class="form-control" name="nama" placeholder="Nama Kelurahan ..." value="<?= old('nama') ?>">
                                <p class="text-danger"><?= $validation->getError('nama') ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenisKelamin" id="jenisKelamin" class="form-control">
                                    <option value="P">Pria</option>
                                    <option value="W">Wanita</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tempatLahir " class="form-label">Tempat Lahir</label>
                                <input id="tempatLahir" type="text" class="form-control" name="tempatLahir" placeholder="Tempat lahir ..." value="<?= old('tempatLahir') ?>">
                                <p class="text-danger"><?= $validation->getError('tempatLahir') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="tanggalLahir " class="form-label">Tanggal Lahir</label>
                                <input id="tanggalLahir" type="date" class="form-control" name="tanggalLahir" value="<?= old('tanggalLahir') ?>">
                                <p class="text-danger"><?= $validation->getError('tanggalLahir') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <select name="agama" id="agama" class="form-control">
                                    <option value="katolik">Katolik</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="islam">islam</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="budha">Budha</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nomorHp " class="form-label">Nomor Hp</label>
                                <input id="nomorHp" type="text" class="form-control" name="nomorHp" placeholder="Nomor hp ..." value="<?= old('nomorHp') ?>">
                                <p class="text-danger"><?= $validation->getError('nomorHp') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="alamat " class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"><?= old('alamat') ?></textarea>
                                <p class="text-danger"><?= $validation->getError('alamat') ?></p>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            <?php else : ?>
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title">Forms Update</h5>
                        <form action="/admin/petugas/edit/<?= $dataEdit['id'] ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <select name="idJabatan" id="jabatan" class="form-control">
                                    <?php foreach ($listJabatan as $jabatan) : ?>
                                        <?php if ($jabatan['id'] == $dataEdit['idJabatan']) : ?>
                                            <option value="<?= $jabatan['id'] ?>" selected><?= $jabatan['nama'] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $jabatan['id'] ?>"><?= $jabatan['nama'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input id="nama" type="text" class="form-control" name="nama" placeholder="Nama kelurahan..." value="<?= old('nama') ? old('nama') : $dataEdit['nama'] ?>">
                                <p class="text-danger"><?= $validation->getError('nama') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenisKelamin" id="jenisKelamin" class="form-control">
                                    <?php if ($dataEdit['jenisKelamin'] == 'P') : ?>
                                        <option value="P" selected>Pria</option>
                                    <?php else : ?>
                                        <option value="W">Wanita</option>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                                <input id="tempatLahir" type="text" class="form-control" name="tempatLahir" placeholder="Tempat lahir ...." value="<?= old('tempatLahir') ? old('tempatLahir') : $dataEdit['tempatLahir'] ?>">
                                <p class="text-danger"><?= $validation->getError('tempatLahir') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                                <input id="tanggalLahir" type="date" class="form-control" name="tanggalLahir" placeholder="Tanggal lahir ...." value="<?= old('tanggalLahir') ? old('tanggalLahir') : $dataEdit['tanggalLahir'] ?>">
                                <p class="text-danger"><?= $validation->getError('tanggalLahir') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <select name="agama" id="agama" class="form-control">
                                    <?php if ($dataEdit['agama'] == 'katolik') : ?>
                                        <option value="katolik">Katolik</option>
                                    <?php elseif ($dataEdit['agama'] == 'kristen') : ?>
                                        <option value="kristen">Kristen</option>
                                    <?php elseif ($dataEdit['agama'] == 'islam') : ?>
                                        <option value="islam">islam</option>
                                    <?php elseif ($dataEdit['agama'] == 'hindu') : ?>
                                        <option value="hindu">Hindu</option>
                                    <?php else : ?>
                                        <option value="budha">Budha</option>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nomorHp" class="form-label">Nomor HP</label>
                                <input id="nomorHp" type="text" class="form-control" name="nomorHp" placeholder="Nomor Hp ...." value="<?= old('nomorHp') ? old('nomorHp') : $dataEdit['nomorHp'] ?>">
                                <p class="text-danger"><?= $validation->getError('nomorHp') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="nomorHp" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"><?= old('alamat') ? old('alamat') : $dataEdit['alamat'] ?></textarea>
                                <p class="text-danger"><?= $validation->getError('alamat') ?></p>
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
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>JK</th>
                                <th>TTL</th>
                                <th>Agama</th>
                                <th>Nomor HP</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listPetugas as $petugas) : ?>
                                <tr>
                                    <td><?= $petugas['nama'] ?></td>
                                    <td><?= $petugas['namaJabatan'] ?></td>
                                    <td><?= $petugas['jenisKelamin'] ?></td>
                                    <td><?= $petugas['tempatLahir'] . ', ' . $petugas['tanggalLahir'] ?></td>
                                    <td><?= $petugas['agama'] ?></td>
                                    <td><?= $petugas['nomorHp'] ?></td>
                                    <td><?= $petugas['alamat'] ?></td>
                                    <td>
                                        <a class="btn btn-outline-warning btn-sm" href="/admin/petugas/edit/<?= $petugas['id'] ?>"><i class="fa fa-pencil"></i></a>

                                        <form class="d-inline-block" action="/admin/petugas/<?= $petugas['id'] ?>" method="post">
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