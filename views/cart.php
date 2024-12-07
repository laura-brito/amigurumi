<div class="nana-section before-footer-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Imagem</th>
                                <th class="product-name">Produto</th>
                                <th class="product-price">Preço</th>
                                <th class="product-quantity">Quantidade</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Remover</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product-thumbnail">
                                    <img src="images/amigurumis-produtos/pinguim-2.png" alt="Image" class="img-fluid">
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black">Amigurumi Pinguim</h2>
                                </td>
                                <td>R$159,90</td>
                                <td>
                                    <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                        style="max-width: 120px;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-black decrease"
                                                type="button">&minus;</button>
                                        </div>
                                        <input type="text" class="form-control text-center quantity-amount" value="1">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-black increase" type="button">&plus;</button>
                                        </div>
                                    </div>

                                </td>
                                <td>R$159,90</td>
                                <td><a href="#" class="btn btn-black btn-sm">X</a></td>
                            </tr>

                            <tr>
                                <td class="product-thumbnail">
                                    <img src="images/amigurumis-produtos/gata-3.png" alt="Image" class="img-fluid">
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black">Amigurumi Gatinha</h2>
                                </td>
                                <td>R$99,99</td>
                                <td>
                                    <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                        style="max-width: 120px;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-black decrease"
                                                type="button">&minus;</button>
                                        </div>
                                        <input type="text" class="form-control text-center quantity-amount" value="1">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-black increase" type="button">&plus;</button>
                                        </div>
                                    </div>

                                </td>
                                <td>R$99,99</td>
                                <td><a href="#" class="btn btn-black btn-sm">X</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <!-- Fim carrinho (produtos) -->

        <!-- Começo carrinho (cupom + total) -->

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <label class="text-black h4" for="coupon">Cupom</label>
                        <p>Insira aqui o seu código de cupom</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control py-3" id="coupon" placeholder="Código de cupom">
                    </div>
                    <div class="col-md-4 mb-4">
                        <button class="btn btn-black">Aplicar cupom</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Valor total</h3>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <span class="text-black">Subtotal</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">R$259,89</strong>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Total</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">R$259,89</strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a class="btn btn-black btn-lg py-3 btn-block"
                                    href="<?php echo BASE_URL; ?>shop/checkout">Continuar para
                                    checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fim carrinho (cupom + total) -->

    </div>
</div>