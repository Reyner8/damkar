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
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title">Forms</h5>
                        
                        <form action="/admin/kejadian/dokumentasi/<?= $kejadian['id'] ?>" method="post" enctype="multipart/form-data">
                            <hr>
                           
                            <div class="mb-4">
                                <label for="tanggal">Tanggal Penugasan</label>
                                <input type="file" class="form-control" name="files[]" multiple>
                            </div>
                          
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
           
        </div>

        <!-- table -->
        <div class="col-md-8">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-body">
                    <h5 class="card-title">Data</h5>
                    <table id="datatable" class="display table border-dark">
                        <thead class="text-center">
                            <tr>
                                <th>Files</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($listDokumentasi as $dokumentasi) : ?>
                                <tr>
                                    <td><img width="100" src="/assets/uploads/galeri/<?= $dokumentasi['file'] ?>" alt="<?= $dokumentasi['file'] ?>"></td>
                                    <td> 
                                        <form class="d-inline-block" action="/admin/kejadian/dokumentasi/<?= $dokumentasi['id'] ?>" method="post">
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