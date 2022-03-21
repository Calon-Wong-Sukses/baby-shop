<div class="card shadow mb-4">
    <!-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
    </div> -->
    <div class="card-body">
        <div class="container-fluid">
            <div id="carouselExampleSlidesOnly" class="carousel slide mb-3" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= base_url('assets/foto/slider1.jpg') ?>" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/foto/slider1.jpg') ?>" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/foto/slider1.jpg') ?>" class="d-block w-100">
                    </div>
                </div>
            </div>
            <hr>

            <div class="row text-center">
                <?php foreach ($produk as $p) : ?>
                    <div class="card mr-2 shadow" style="width: 18rem;">
                        <img src="<?= base_url('assets/foto/' . $p->foto) ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= $p->nama_produk ?></h5>
                            <p class="card-text"><?= $p->deskripsi_produk ?></p>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-search"></i> Detail</a>
                            <a href="#" class="btn btn-info btn-sm"><i class="fas fa-cart-arrow-down"></i> Add To Cart</a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>