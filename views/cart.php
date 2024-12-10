<div class="nana-section before-footer-section">
    <div class="container">
        <?php if (empty($products)): ?>
            <p>Seu carrinho está vazio!</p>
        <?php else: ?>
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table bg-cream">
                        <table class="table bg-cream">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Imagem</th>
                                    <th class="product-name">Produto</th>
                                    <th class="product-price">Preço</th>
                                    <th class="product-quantity">Quantidade</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="<?php echo BASE_URL . 'shop/product?id=' . $product['id'] ?>">
                                                <img src="<?php echo BASE_URL . 'assets/images/products/' . $product['id'] . '-1.png'; ?>"
                                                    alt="Image" class="img-fluid">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <h5 class="h5 text-black"><?php echo $product['name']; ?></h5>
                                        </td>
                                        <td>R$ <?php echo number_format($product['price'], 2, ',', '.'); ?></td>
                                        <td>
                                            <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                                style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-black decrease"
                                                        type="button">&minus;</button>
                                                    <input type="text" class="form-control text-center quantity-amount"
                                                        value="<?php echo $product['quantity'] ?>">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-black increase"
                                                            type="button">&plus;</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        <td>R$ <?php echo calculateTotal($product['price'], $product['quantity']); ?></td>
                                        <td><a href="<?php echo BASE_URL . 'shop/cart/remove?id=' . $product['id']; ?>"
                                                class="btn btn-black btn-sm">Remover</a></td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <!-- Fim carrinho (produtos) -->

            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6 pl-5 bg-cream">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h4 class="text-black h4 ">Valor total</h4>
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
                                    <strong class="text-black">R$
                                        <?php echo calculateCartTotal($_SESSION['cart']) ?></strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-black btn-lg py-3 btn-block"
                                        href="<?php echo BASE_URL; ?>checkout">Continuar para
                                        checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>