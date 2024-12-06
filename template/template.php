<?php
session_start();
?>
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
                <a href="<?php echo BASE_URL; ?>home">
                    <img src="<?php echo BASE_URL; ?>assets/images/logo.svg" alt="Amigurumi" width="115px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsNana"
                    aria-controls="navbarsNana" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsNana">
                    <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>home">Início</a>
                        </li>
                        <li><a class="nav-link" href="<?php echo BASE_URL; ?>shop">Loja</a></li>
                        <li><a class="nav-link" href="<?php echo BASE_URL; ?>about">Sobre nós</a></li>
                        <li><a class="nav-link" href="<?php echo BASE_URL; ?>contact">Contato</a></li>
                    </ul>

                    <form class="d-flex search-bar" role="search">
                        <input class="form-control me-2" id="search" type="search" placeholder="Buscar"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit"><i
                                class="bi bi-search-heart"></i></button>
                    </form>

                    <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">

                        <?php if (isset($_SESSION['person']) && $isLoggedIn): ?>
                            <div class="d-flex align-self-center">

                                <div class="dropdown">
                                    <a class="dropdown-toggle link-light" style="text-decoration: none;" href="#"
                                        data-bs-toggle="dropdown" aria-expanded="false">Olá,
                                        <strong><?php echo htmlspecialchars($_SESSION['person']['name']) ?></strong>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                                        <li><a class="dropdown-item" href="#">Meus pedidos</a></li>
                                        <hr>
                                        <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>logout">Sair</a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php else: ?>
                            <li><a class="nav-link pointer" data-bs-toggle="modal" data-bs-target="#loginModal"><img
                                        src="<?php echo BASE_URL; ?>assets/images/user.svg"></a>
                            <?php endif; ?>
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
                    <p class="mb-4">Somos apaixonados pela arte do amigurumi e dedicados a trazer alegria e
                        encantamento
                        através de nossos produtos.
                        Cada peça é cuidadosamente feita à mão com materiais de alta qualidade, garantindo não
                        apenas
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

    <!-- Modal -->
    <div class="modal fade p-0" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="p-5">
                                <div class="text-center pb-5">
                                    <i class="bi bi-person-circle" style="font-size: 80px;"></i>
                                </div>
                                <form class="user" method="post" action="<?php echo BASE_URL; ?>login">
                                    <div class="form-group pb-2">
                                        <input type="text" id="username" name="username"
                                            class="form-control form-control-user" aria-describedby="emailHelp"
                                            placeholder="Email ou CPF">
                                    </div>
                                    <div class="form-group pb-2">
                                        <input type="password" class="form-control form-control-user" id="password"
                                            name="password" placeholder="Senha">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Lembrar-se de
                                                mim</label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-sm btn-outline-black">
                                            Login
                                        </button>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small pointer" data-bs-toggle="modal"
                                        data-bs-target="#registerModal">Criar uma
                                        conta!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Cadastro de novo cliente</h1>
                                    <p class="text-gray-300">Campos marcados com * são de preenchimento
                                        obrigatório
                                    </p>
                                </div>
                                <form class="user" action="<?php echo BASE_URL; ?>person/register_action" method="post">
                                    <div class="form-group row pb-2">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <label for="name" class="form-label">Nome Completo*</label>
                                            <input type="text" class="form-control form-control-user" id="name"
                                                name="name" placeholder="">

                                        </div>
                                    </div>
                                    <div class="form-group pb-2">
                                        <div class="col-sm-12 mb-3 mb-sm-0 ">
                                            <label for="email" class="form-label">Email*</label>

                                            <input type="email" class="form-control form-control-user" id="email"
                                                name="email">
                                        </div>
                                    </div>
                                    <div class="form-group pb-2">
                                        <div class="col-sm-12 mb-3 mb-sm-0 ">
                                            <label for="cpf" class="form-label">CPF*</label>

                                            <input type="text" class="form-control form-control-user" id="cpf"
                                                name="cpf">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-4">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <label for="password" class="form-label">Senha*</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control form-control-user"
                                                aria-describedby="passwordHelpBlock">
                                            <div id="passwordHelpBlock" class="form-text">
                                                Sua senha precisa ser entre 8-20 caracteres
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-sm btn-outline-black pointer">
                                            Cadastrar
                                        </button>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small pointer" data-bs-toggle="modal" data-bs-target="#loginModal">Já
                                        tem uma
                                        conta?
                                        Faça seu login!</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

</body>

</html>