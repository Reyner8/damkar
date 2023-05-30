<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title><?= $judul ?></title>
</head>

<body>
    <div class="bg_pattern">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh; width: 100%">
            <div class="col-md-5">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-title text-center mt-4">
                        <h3>Sign in</h3>
                    </div>
                    <?php if (session()->getFlashdata('msg')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('msg') ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <form action="auth/log/in" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username..." value="<?= old('username') ?>">
                                <p class="text-danger">
                                    <?= $validation->getError('username') ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password anda...">
                            </div>
                            <p class="text-danger">
                                <?= $validation->getError('password') ?>
                            </p>
                            <button class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>