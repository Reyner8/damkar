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
                        <form action="/admin/kejadian" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="alamat " class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"><?= old('alamat') ?></textarea>
                                <p class="text-danger"><?= $validation->getError('alamat') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="idKelurahan" class="form-label">Kelurahan</label>
                                <select name="idKelurahan" id="idKelurahan" class="form-control">
                                    <?php foreach ($listKelurahan as $kelurahan) : ?>
                                        <option value="<?= $kelurahan['id'] ?>"><?= $kelurahan['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="latitude " class="form-label">Latitude</label>
                                <input id="latitude" type="text" class="form-control" name="latitude" placeholder="latitude ..." value="<?= old('latitude') ?>">
                                <p class="text-danger"><?= $validation->getError('latitude') ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="longitude " class="form-label">Longitude</label>
                                <input id="longitude" type="text" class="form-control" name="longitude" placeholder="longitude ..." value="<?= old('longitude') ?>">
                                <p class="text-danger"><?= $validation->getError('longitude') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="penyebab " class="form-label">penyebab</label>
                                <textarea class="form-control" name="penyebab" id="penyebab" cols="30" rows="10"><?= old('penyebab') ?></textarea>
                                <p class="text-danger"><?= $validation->getError('penyebab') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal " class="form-label">Tanggal</label>
                                <input id="tanggal" type="date" class="form-control" name="tanggal" value="<?= old('tanggal') ?>">
                                <p class="text-danger"><?= $validation->getError('tanggal') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="jamLapor " class="form-label">Jam Lapor</label>
                                <input id="jamLapor" type="time" class="form-control" name="jamLapor" value="<?= old('jamLapor') ?>">
                                <p class="text-danger"><?= $validation->getError('jamLapor') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="jamTanggap " class="form-label">Jam Lapor</label>
                                <input id="jamTanggap" type="time" class="form-control" name="jamTanggap" value="<?= old('jamTanggap') ?>">
                                <p class="text-danger"><?= $validation->getError('jamTanggap') ?></p>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            <?php else : ?>
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title">Forms Update</h5>
                        <form action="/admin/kejadian/edit/<?= $dataEdit['id'] ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"><?= old('alamat') ? old('alamat') : $dataEdit['alamat'] ?></textarea>
                                <p class="text-danger"><?= $validation->getError('alamat') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="idKelurahan" class="form-label">Kelurahan</label>
                                <select name="idKelurahan" id="idKelurahan" class="form-control">
                                    <?php foreach ($listKelurahan as $kelurahan) : ?>
                                        <?php if ($dataEdit['idKelurahan'] == $kelurahan['id']) : ?>
                                            <option value="<?= $kelurahan['id'] ?>" selected><?= $kelurahan['nama'] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $kelurahan['id'] ?>"><?= $kelurahan['nama'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="latitude" class="form-label">Latitude</label>
                                <input id="latitude" type="text" class="form-control" name="latitude" placeholder="latitude kelurahan..." value="<?= old('latitude') ? old('latitude') : $dataEdit['latitude'] ?>">
                                <p class="text-danger"><?= $validation->getError('latitude') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="longitude" class="form-label">Longitude</label>
                                <input id="longitude" type="text" class="form-control" name="longitude" placeholder="longitude kelurahan..." value="<?= old('longitude') ? old('longitude') : $dataEdit['longitude'] ?>">
                                <p class="text-danger"><?= $validation->getError('longitude') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="penyebab" class="form-label">Penyebab</label>
                                <textarea class="form-control" name="penyebab" id="penyebab" cols="30" rows="10"><?= old('penyebab') ? old('penyebab') : $dataEdit['penyebab'] ?></textarea>
                                <p class="text-danger"><?= $validation->getError('penyebab') ?></p>
                            </div>



                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input id="tanggal" type="date" class="form-control" name="tanggal" placeholder="Tanggal ...." value="<?= old('tanggal') ? old('tanggal') : $dataEdit['tanggal'] ?>">
                                <p class="text-danger"><?= $validation->getError('tanggal') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="jamLapor" class="form-label">Jam Lapor</label>
                                <input id="jamLapor" type="time" class="form-control" name="jamLapor" placeholder="Jam Lapor ...." value="<?= old('jamLapor') ? old('jamLapor') : $dataEdit['jamLapor'] ?>">
                                <p class="text-danger"><?= $validation->getError('jamLapor') ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="jamTanggap" class="form-label">Jam Tanggap</label>
                                <input id="jamTanggap" type="time" class="form-control" name="jamTanggap" placeholder="Jam Tanggap ...." value="<?= old('jamTanggap') ? old('jamTanggap') : $dataEdit['jamTanggap'] ?>">
                                <p class="text-danger"><?= $validation->getError('jamTanggap') ?></p>
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
                                        <a class="btn btn-outline-warning btn-sm" href="/admin/kejadian/edit/<?= $kejadian['id'] ?>"><i class="fa fa-pencil"></i></a>

                                        <form class="d-inline-block" action="/admin/kejadian/<?= $kejadian['id'] ?>" method="post">
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