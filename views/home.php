<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/home.css">

<?php require './template/hero.php' ?>

<div class="product-section m-lg-1 justify-content-around">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-3 mb-5 mb-md-0">
                <h2 class="mb-4 section-title">Peças feitas à mão.</h2>
                <p class="mb-4">Confeccionado com excelente material e cuidadosamente feito à mão com amor e
                    dedicação, garantido um produto único e especial.</p>
                <p><a href="<?php echo BASE_URL; ?>shop" class="btn">Explorar</a></p>
            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <img src="<?php echo BASE_URL; ?>assets/images/knitting.png"
                    class="img-fluid product-thumbnail about-images">

                <h3 class="product-title">Produtos feitos com amor</h3>
            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <img src="<?php echo BASE_URL; ?>assets/images/present.png"
                    class="img-fluid product-thumbnail about-images">
                <h3 class="product-title ">Embalados com carinho</h3>
            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                <img src="<?php echo BASE_URL; ?>assets/images/delivery-location.png"
                    class="img-fluid product-thumbnail about-images">
                <h3 class="product-title">Para o conforto do seu lar</h3>
            </div>
        </div>
    </div>
</div>

<?php require './template/why-choose-us.php' ?>