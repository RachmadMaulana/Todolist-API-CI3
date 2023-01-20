<div class="container my-3">
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Selamat Datang <?= $this->session->userdata('name'); ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"></a>
                        </li>
                    </ul>
                    <form class="d-flex" action="<?= base_url('todolist/logout'); ?>">
                        <button class="btn btn-outline-primary" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col-6">
            <h4>List Kegiatan</h4>
            <?php $this->load->view('layouts/_alert'); ?>
            <?= form_open('todolist/add'); ?>
            <div class="row">
                <div class="col">
                    <input type="text" name="kegiatan" class="form-control" placeholder="Tambah Kegiatan">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
            <?= form_close(); ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kegiatan as $key => $kg) : ?>
                        <tr>
                            <th scope="row"><?= ++$key; ?></th>
                            <td><?= $kg['kegiatan']; ?></td>
                            <td>
                                <button class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#editmodal<?= $kg['id']; ?>">
                                    <i class="fas fa-edit text-info"></i>
                                </button>
                                <a href="<?= base_url('todolist/delete/') ?><?= $kg['id']; ?>" class="btn btn-sm" onclick="return confirm('Apakah anda yakin?')">
                                    <i class="fas fa-trash text-danger"></i>
                                </a>
                                <a href="<?= base_url('todolist/selesai/') ?><?= $kg['id']; ?>" class="btn btn-sm"><i class="fa-solid fa-check text-success"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <h4>Selesai</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kegiatanSelesai as $key => $kg) : ?>
                        <tr>
                            <th scope="row"><?= ++$key; ?></th>
                            <td><?= $kg['kegiatan']; ?></td>
                            <td>
                                <a href="<?= base_url('todolist/delete/') ?><?= $kg['id']; ?>" class="btn btn-sm" onclick="return confirm('Apakah anda yakin?')">
                                    <i class="fas fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<?php foreach ($kegiatan as $key => $kg) : ?>
    <div class="modal fade" id="editmodal<?= $kg['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kegiatan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= form_open('todolist/edit', ['method' => 'POST']) ?>
                    <input type="hidden" value="<?= $kg['id']; ?>" name="idKegiatan" class="form-control">
                    <div class="form-group">
                        <label for="kegiatan" class="form-label">Kegiatan</label>
                        <input type="text" name="kegiatan" class="form-control" value="<?= $kg['kegiatan']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>