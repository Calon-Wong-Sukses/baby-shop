<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/kategori') ?>" class="btn btn-info btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    </div>

    <div class="card-body">
        <?php foreach ($kategori as $k) : ?>
            <form action="<?= base_url('admin/kategori/edit_aksi') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="hidden" name="id_kategori" value="<?= $k->id_kategori ?>">
                    <input type="text" name="nama_kategori" class="form-control" value="<?= $k->nama_kategori ?>">
                    <?= form_error('nama_kategori', '<div class="text-small text-danger">', '</div>') ?>
                </div>

                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
            </form>
        <?php endforeach ?>
    </div>
</div>