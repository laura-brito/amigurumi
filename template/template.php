<?php

$currentPage = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nana</title>
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    <meta name="author" content="Laura Brito Lisboa">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content />
    <meta name="keywords" content="amigurumi, croche" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/template.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css">

</head>

<body>

    <header>
        <!-- Começo navbar -->
        <?php require 'nav-bar.php' ?>
    </header>

    <main>
        <?php $this->loadView($viewName, $viewData); ?>
    </main>

    <!-- Começo footer -->

    <?php require 'footer.php' ?>

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
                                    <input type="hidden" name="redirect_url"
                                        value="<?php echo htmlspecialchars($currentPage); ?>">

                                    <div class="form-group pb-2">
                                        <input type="text" id="username" name="username"
                                            class="form-control form-control-user" aria-describedby="emailHelp"
                                            placeholder="E-mail">
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
                                    <p class="text-gray-300">Campos marcados com <span class="text-danger">*</span> são
                                        de preenchimento
                                        obrigatório
                                    </p>
                                </div>
                                <form class="user" action="<?php echo BASE_URL; ?>person/register_action" method="post">
                                    <div class="form-group row pb-2">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <label for="name" class="form-label">Nome Completo <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-user" id="name"
                                                name="name" placeholder="">

                                        </div>
                                    </div>
                                    <div class="form-group pb-2">
                                        <div class="col-sm-12 mb-3 mb-sm-0 ">
                                            <label for="email" class="form-label">E-mail <span
                                                    class="text-danger">*</span></label>

                                            <input type="email" class="form-control form-control-user" id="email"
                                                name="email">
                                        </div>
                                    </div>
                                    <div class="form-group row pb-4">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <label for="password" class="form-label">Senha <span
                                                    class="text-danger">*</span></label>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>