<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <meta name="author" content="Laura Brito Lisboa">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content />
    <meta name="keywords" content="amigurumi, croche" />

    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/template.css">
    <link href="<?php echo BASE_URL; ?>assets/css/style.css" rel="stylesheet">

</head>

<body>

    <header>
        <!-- Começo navbar -->
        <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Nana navigation bar">

            <div class="container">
                <a href="index.html">
                    <img src="<?php echo BASE_URL; ?>assets/images/logo.svg" alt="Amigurumi" width="115px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsNana"
                    aria-controls="navbarsNana" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsNana">
                    <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Início</a>
                        </li>
                        <li><a class="nav-link" href="shop.html">Loja</a></li>
                        <li><a class="nav-link" href="about.html">Sobre nós</a></li>
                        <li><a class="nav-link" href="contact.html">Contato</a></li>
                    </ul>

                    <form class="d-flex search-bar" role="search">
                        <input class="form-control me-2" id="search" type="search" placeholder="Buscar"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit"><i
                                class="bi bi-search-heart"></i></button>
                    </form>

                    <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                        <li><a class="nav-link" href="login.html"><img
                                    src="<?php echo BASE_URL; ?>assets/images/user.svg"></a>
                        </li>
                        <li><a class="nav-link position-relative" href="cart.html"><img
                                    src="<?php echo BASE_URL; ?>assets/images/cart.svg">
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">2
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?php $this->loadView($viewName, $viewData); ?>
    </main>

    <!-- Começo footer -->

    <footer class="footer-section">
        <div class="container relative">

            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap">

                        <a href="index.html">
                            <img src="<?php echo BASE_URL; ?>assets/images/logo.svg" style="width: 115px;">
                        </a>
                    </div>
                    <p class="mb-4">Somos apaixonados pela arte do amigurumi e dedicados a trazer alegria e encantamento
                        através de nossos produtos.
                        Cada peça é cuidadosamente feita à mão com materiais de alta qualidade, garantindo não apenas
                        beleza, mas também durabilidade.
                        Valorizamos a exclusividade, por isso oferecemos designs únicos e a possibilidade de
                        personalização, tornando cada amigurumi especial e significativo.</p>

                    <ul class="list-unstyled custom-social">
                        <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-8">
                    <div class="row links-wrap">
                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="about.html">Sobre nós</a></li>
                                <li><a href="contact.html">Contato</a></li>
                                <li><a href="contact.html">Suporte</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="about.html">Nosso time</a></li>
                                <li><a href="#">Termos e condições</a></li>
                                <li><a href="#">Política de privacidade</a></li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>

            <div class="border-top copyright">
                <div class="row pt-4">
                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">Copyright &copy;
                            <script>
                            document.write(new Date().getFullYear());
                            </script>. Todos os direitos reservados.
                            &mdash; Feito por Laura Brito Lisboa
                        </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Fim footer -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script> -->

</body>

</html>