<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/produk') ?>" class="btn btn-info btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    </div>

    <div class="card-body">
        <?php foreach ($produk as $p) : ?>
            <form action="<?= base_url('admin/produk/edit_aksi') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="hidden" name="id_produk" value="<?= $p->id_produk ?>">
                    <input type="text" name="nama_produk" class="form-control" value="<?= $p->nama_produk ?>">
                    <?= form_error('nama_produk', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Kategori Produk</label>
                    <select name="id_kategori" class="form-control">
                        <option value="<?= $p->id_kategori ?>"><?= $p->id_kategori ?></option>
                        <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('id_kategori', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Deskripsi Produk</label>
                    <textarea name="deskripsi_produk" class="form-control"><?= $p->deskripsi_produk ?></textarea>
                    <?= form_error('deskripsi_produk', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Harga Produk</label>
                    <input type="number" name="harga_produk" class="form-control" value="<?= $p->harga_produk ?>">
                    <?= form_error('harga_produk', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Stok Produk</label>
                    <input type="text" name="stok_produk" class="form-control" value="<?= $p->stok_produk ?>">
                    <?= form_error('stok_produk', '<div class="text-small text-danger">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label>Foto</label><br>
                    <img src="<?= base_url('assets/foto/' . $p->foto) ?>" width="80px" height="60px">
                    <input type="file" name="foto" class="form-control mt-2">
                </div>

                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
            </form>
        <?php endforeach ?>
    </div>
</div>