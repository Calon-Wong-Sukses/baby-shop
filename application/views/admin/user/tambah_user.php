<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/user') ?>" class="btn btn-info btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    </div>

    <div class="card-body">
        <form action="<?= base_url('admin/user/tambah_aksi') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
                <?= form_error('username', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control">
                <?= form_error('password', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>No Telp</label>
                <input type="number" name="no_telp" class="form-control">
                <?= form_error('no_telp', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control">
                <?= form_error('email', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option value="">-- Pilih Role --</option>
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                </select>
                <?= form_error('role', '<div class="text-small text-danger">', '</div>') ?>
            </div>

            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
        </form>
    </div>
</div>