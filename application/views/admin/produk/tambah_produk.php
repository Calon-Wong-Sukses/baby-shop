<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('admin/produk') ?>" class="btn btn-info btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    </div>

    <div class="card-body">
        <form action="<?= base_url('admin/produk/tambah_aksi') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control">
                <?= form_error('nama_produk', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Kategori Produk</label>
                <select name="id_kategori" class="form-control">
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($kategori as $k) : ?>
                        <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                    <?php endforeach ?>
                </select>
                <?= form_error('id_kategori', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Deskripsi Produk</label>
                <textarea name="deskripsi_produk" class="form-control"></textarea>
                <?= form_error('deskripsi_produk', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Harga Produk</label>
                <input type="number" name="harga_produk" class="form-control">
                <?= form_error('harga_produk', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Stok Produk</label>
                <input type="number" name="stok_produk" class="form-control">
                <?= form_error('stok_produk', '<div class="text-small text-danger">', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
        </form>
    </div>
</div>