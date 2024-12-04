<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Cadastro de novo cliente</h1>
                                <p class="text-gray-300">Campos marcados com * são de preenchimento obrigatório</p>
                            </div>
                            <form class="user">
                                <div class="form-group row pb-2">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label for="name" class="form-label">Nome Completo*</label>
                                        <input type="text" class="form-control form-control-user" id="name"
                                            placeholder="">

                                    </div>
                                </div>
                                <div class="form-group pb-2">
                                    <div class="col-sm-12 mb-3 mb-sm-0 ">
                                        <label for="email" class="form-label">Email*</label>

                                        <input type="email" class="form-control form-control-user"
                                            id="exampleInputEmail">
                                    </div>
                                </div>
                                <div class="form-group pb-2">
                                    <div class="col-sm-12 mb-3 mb-sm-0 ">
                                        <label for="cpf" class="form-label">CPF*</label>

                                        <input type="text" class="form-control form-control-user" id="cpf">
                                    </div>
                                </div>
                                <div class="form-group row pb-4">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label for="password" class="form-label">Senha*</label>
                                        <input type="password" id="password" class="form-control form-control-user"
                                            aria-describedby="passwordHelpBlock">
                                        <div id="passwordHelpBlock" class="form-text">
                                            Sua senha precisa ser entre 8-20 caracteres
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a href="login.html" class="btn btn-sm btn-outline-black">
                                        Cadastrar
                                    </a>
                                </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?php echo BASE_URL; ?>login">Já tem uma conta?
                                    Faça seu login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>