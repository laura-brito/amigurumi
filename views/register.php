<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Cadastro de novo cliente</h1>
                    <?php if ($errors != ''): ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Erro!</strong> <?php echo $errors ?>
                        </div>
                    <?php endif; ?>
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
                            <input type="text" class="form-control form-control-user" id="name" name="name"
                                placeholder="" required="true">
                        </div>
                    </div>
                    <div class="form-group pb-2">
                        <div class="col-sm-12 mb-3 mb-sm-0 ">
                            <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>

                            <input type="email" class="form-control form-control-user" id="email" name="email">
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label for="password" class="form-label">Senha <span class="text-danger">*</span></label>
                            <input type="password" id="password" name="password" class="form-control form-control-user"
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