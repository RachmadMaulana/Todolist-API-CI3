<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="border border-3 border-primary"></div>
                <div class="card bg-white shadow-lg">
                    <div class="card-body p-5">
                        <form class="mb-3 mt-md-4" action="<?= base_url('auth/register') ?>" method="post">
                            <h2 class="fw-bold mb-2 text-uppercase text-center">Todolist</h2>
                            <div class="mb-3">
                                <label for="email" class="form-label ">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="email@example.com">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label ">Nama</label>
                                <input type="text" name="nama" class="form-control" id="name">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label ">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="*******">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label ">Ulangi Password</label>
                                <input type="password" name="password2" class="form-control" id="password" placeholder="*******">
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-outline-dark" type="submit">Daftar</button>
                            </div>
                        </form>

                        <div>
                            <p class="mb-0  text-center">Sudah Punya akun? <a href="<?= base_url('auth'); ?>" class="text-primary fw-bold">Login</a> </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>