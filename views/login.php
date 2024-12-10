<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="p-5">
                <div class="text-center pb-5">
                    <i class="bi bi-person-circle" style="font-size: 80px;"></i>
                </div>

                <?php if ($errors != ''): ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Erro!</strong> <?php echo $errors ?>
                    </div>
                <?php endif; ?>
                <form class="user" method="post" action="<?php echo BASE_URL; ?>login">
                    <input type="hidden" name="redirect_url" value="<?php echo htmlspecialchars($currentPage); ?>">

                    <div class="form-group pb-2">
                        <input type="text" id="username" name="username" class="form-control form-control-user"
                            aria-describedby="emailHelp" placeholder="E-mail">
                    </div>
                    <div class="form-group pb-2">
                        <input type="password" class="form-control form-control-user" id="password" name="password"
                            placeholder="Senha">
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
                    <a class="small pointer" data-bs-toggle="modal" data-bs-target="#registerModal">Criar uma
                        conta!</a>
                </div>
            </div>
        </div>
    </div>
</div>