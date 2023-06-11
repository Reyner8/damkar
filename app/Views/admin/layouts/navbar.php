<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="fa-solid fa-fire"></i> Pemadam Kebakaran
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <ul class="navbar-nav">

                <!-- admin -->
                <?php if (session()->get('role') == 'admin') : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/admin/beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/admin/kejadian">Kejadian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/admin/petugas">Keanggotaan</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data Master
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/admin/kecamatan">Kecamatan</a></li>
                            <li><a class="dropdown-item" href="/admin/kelurahan">Kelurahan</a></li>
                            <li><a class="dropdown-item" href="/admin/regu">Regu</a></li>
                            <li><a class="dropdown-item" href="/admin/jabatan">Jabatan</a></li>
                            <li><a class="dropdown-item" href="/admin/petugas">Petugas</a></li>

                        </ul>
                    </li>
                <?php endif; ?>

            </ul>


        </div>

        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user"></i> Profil
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/admin/anggota/profil">Setting</a></li>

                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/auth/log/out">Log-out</a></li>
            </ul>
        </div>
    </div>
</nav>