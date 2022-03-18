<?= $this->session->flashdata('pesan') ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/user/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Username</th>
                        <th>No Telp</th>
                        <th>email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($user as $u) : ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $u->username ?></td>
                            <td><?= $u->no_telp ?></td>
                            <td><?= $u->email ?></td>
                            <td><?= $u->role ?></td>
                            <td>
                                <a href="<?= base_url('admin/user/edit_data/' . $u->id_user) ?>" class="btn btn-circle btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('admin/user/delete_data/' . $u->id_user) ?>" class="btn btn-circle btn-danger" onclick="return confirm('Apakah anda yakin mengahpus data ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>