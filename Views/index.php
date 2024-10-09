<?php include_once 'Views/template/header-principal.php'; ?>



<style>
    .img-fluid1 {
    width: 150px;  /* Define un ancho fijo */
    height: 150px; /* Define un alto fijo */
    object-fit: cover; /* Para que la imagen mantenga su proporción */
}



</style>
    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/images/carrusel/1.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Tineda Online</b> eCommerce</h1>
                                <h3 class="h2">La mejor calidad de imagen</h3>
                                <p>
                                Televisor Smart TV de última generación, diseñado para ofrecer una experiencia de visualización inigualable con imágenes nítidas y colores vibrantes. Con un diseño delgado y elegante, este televisor es perfecto para cualquier habitación, combinando tecnología avanzada con un estilo moderno.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/images/carrusel/2.jpeg" alt="">

                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Lo ultimo en tecnologia</h1>
                                <h3 class="h2">Al alcance de tus manos</h3>
                                <p>
                                El Samsung Galaxy S24 Ultra es el smartphone definitivo para quienes buscan lo último en tecnología móvil. Con un diseño premium y una pantalla impresionante, este dispositivo ofrece una experiencia visual inigualable, junto con un rendimiento superior en todas sus funciones. Ya sea para la fotografía, juegos o productividad, el S24 Ultra está equipado para cualquier desafío.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/images/carrusel/3.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">El mejor sonido</h1>
                                <h3 class="h2">para tus oidos </h3>
                                <p>
                                Sistema de sonido de alta calidad con dos potentes altavoces y consola central, ideal para disfrutar de tu música favorita con un sonido claro y envolvente. Su diseño moderno en tonos negro y detalles en rojo combina estilo y tecnología, perfecto para el hogar o cualquier evento.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categorias</h1>
                <p>
Todo en un solo lugar
                </p>
            </div>
        </div>
        <div class="row">
    <?php foreach ($data['categorias'] as $categoria) { ?>
        <div class="col-12 col-md-2 p-5 mt-3 text-center">
            <a href="<?php echo BASE_URL . 'principal/categorias/' . $categoria['id']; ?>">
                <img src="<?php echo $categoria['imagen']; ?>" class="rounded-circle img-fluid1 border">
            </a>
            <h5 class="text-center mt-3 mb-3"><?php echo $categoria['categoria']; ?></h5>
        </div>
    <?php } ?>
</div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Producto destacado</h1>
                </div>
            </div>
            <div class="row">
                <?php foreach ($data['nuevoProductos'] as $producto) {?>
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>">
                                <img src="<?php echo $producto['imagen']; ?>" class="card-img-top" alt="<?php echo $producto['nombre']; ?>">
                            </a>
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                    <li class="text-muted text-right"><?php echo MONEDA . ' ' . $producto['precio']; ?></li>
                                </ul>
                                <a href="<?php echo BASE_URL . 'principal/detail' . $producto['id']; ?>" class="h2 text-decoration-none text-dark"><?php echo $producto['nombre']; ?></a>
                                <p class="card-text">
                                    <?php echo $producto['descripcion']; ?>
                                </p>
                                <p class="text-muted">Reviews (24)</p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                    <!--<div class="card h-100">
                        <a href="shop-single.html">
                            <img src="<?php echo BASE_URL; ?>assets/img/feature_prod_03.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$360.00</li>
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">Summer Addides Shoes</a>
                            <p class="card-text">
                                Curabitur ac mi sit amet diam luctus porta. Phasellus pulvinar sagittis diam, et scelerisque ipsum lobortis nec.
                            </p>
                            <p class="text-muted">Reviews (74)</p>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->

<?php include_once 'Views/template/footer-principal.php'; ?>

</body>

</html>