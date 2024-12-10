<!-- Começo checkout/pagamento -->

<div class="nana-section">
    <div class="container">
        <?php if (!isset($_SESSION['person'])): ?>
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="border p-4 rounded" role="alert">
                        Já é cliente? <a data-bs-toggle="modal" data-bs-target="#loginModal" class="link pointer">Clique
                            aqui</a>
                        para fazer
                        login.
                    </div>

                </div>
            </div>
        <?php endif; ?>
        <form action="<?php echo BASE_URL; ?>checkout/complete" method="post">
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0" id="checkout-form">

                    <h2 class="h3 mb-3 text-black">Informações</h2>
                    <div class="p-3 p-lg-5 border">
                        <p class="text-gray-300">Campos marcados com <span class="text-danger">*</span> são
                            de preenchimento
                            obrigatório
                        </p>
                        <div class="form-group row p-1">
                            <label for="state_uf" class="text-black">Estado <span class="text-danger">*</span></label>
                            <select id="state_uf" name="state_uf" class="form-control">
                                <option value="select">Selecione uma opção...</option>
                                <option value="Acre">Acre</option>
                                <option value="Alagoas">Alagoas</option>
                                <option value="Amapá">Amapá</option>
                                <option value="Amazonas">Amazonas</option>
                                <option value="Bahia">Bahia</option>
                                <option value="Ceará">Ceará</option>
                                <option value="Distrito Federal">Distrito Federal</option>
                                <option value="Espírito Santo">Espírito Santo</option>
                                <option value="Goiás">Goiás</option>
                                <option value="Maranhão">Maranhão</option>
                                <option value="Mato Grosso">Mato Grosso</option>
                                <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                <option value="Minas Gerais">Minas Gerais</option>
                                <option value="Pará">Pará</option>
                                <option value="Paraíba">Paraíba</option>
                                <option value="Paraná">Paraná</option>
                                <option value="Pernambuco">Pernambuco</option>
                                <option value="Piauí">Piauí</option>
                                <option value="Rio de Janeiro">Rio de Janeiro</option>
                                <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                <option value="Rondônia">Rondônia</option>
                                <option value="Roraima">Roraima</option>
                                <option value="Santa Catarina">Santa Catarina</option>
                                <option value="São Paulo">São Paulo</option>
                                <option value="Sergipe">Sergipe</option>
                                <option value="Tocantins">Tocantins</option>
                            </select>
                        </div>



                        <div class="form-group row p-1">
                            <div class="col-md-12">
                                <label for="address_line" class="text-black">Endereço <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address_line" name="address_line"
                                    placeholder="Rua, avenida, etc.">
                            </div>
                        </div>

                        <div class="form-group row p-1">
                            <div class="col-md-6">

                                <label for="number" class="text-black">Número<span class="text-danger">*</span></label>
                                <input type="text" id="number" name="number" class="form-control" placeholder="398">
                            </div>
                            <div class="col-md-6 ">

                                <label for="complement" class="text-black">Complemento</label>
                                <input type="text" id="complement" name="complement" class="form-control"
                                    placeholder="Apartamento, logradouro, unidade, etc. (opcional)">
                            </div>
                        </div>

                        <?php if (!isset($_SESSION['person'])): ?>
                            <div class="form-group row p-1">
                                <div class="col-md-12">
                                    <label for="name" class="text-black">Nome Completo<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="form-group row p-1 mb-5">
                                <div class="col-md-12">
                                    <label for="email" class="text-black">E-mail <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="form-group row p-1">
                                <label for="create_account" class="text-black" data-bs-toggle="collapse"
                                    href="#create_an_account" role="button" aria-expanded="false"
                                    aria-controls="create_an_account"><input type="checkbox" value="1" id="create_account"
                                        name="create_account">
                                    Criar uma conta com esses dados?</label>
                                <div class="collapse" id="create_an_account">
                                    <div class="py-2 mb-4">
                                        <p class="mb-3">Por favor insira uma senha para criar uma conta. Caso já possua
                                            cadastro em nosso site, faça login na opção no início da página.</p>
                                        <div class="form-group">
                                            <label for="password" class="text-black">Senha</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Senha">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        </br>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="row mb-5" id="checkout-form">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Cupom</h2>
                            <div class="p-3 p-lg-5 border">

                                <label for="coupon" class="text-black mb-3">Insira aqui seu código de cupom</label>
                                <div class="input-group w-75 couponcode-wrap">
                                    <input type="text" class="form-control me-2" id="coupon" placeholder="Cupom"
                                        aria-label="Coupon Code" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-black btn-sm" type="button"
                                            onclick="applyCoupom()">Aplicar</button>
                                    </div>
                                </div>
                                <div id="coupom-info"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5" id="checkout-form">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Frete</h2>
                            <div class="p-3 p-lg-5 border">

                                <label for="cep" class="text-black mb-3">Calcular frete</label>

                                <div class="input-group w-75 delivery-wrap">
                                    <input type="text" class="form-control me-2" style="border-radius: 8px;" id="cep"
                                        name="cep" placeholder="xxxxxxxx" aria-label="Cep Code"
                                        aria-describedby="button-addon2" />
                                    <div class="input-group-append">
                                        <button class="btn btn-black btn-sm" type="button"
                                            onclick="calculateDelivery()">Calcular</button>
                                    </div>
                                </div>
                                <div id="delivery-info">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-5" id="checkout-form">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Seu pedido</h2>
                            <div class="p-3 p-lg-5 border">
                                <?php if (empty($products)): ?>
                                    <p>Seu carrinho está vazio!</p>
                                <?php else: ?>
                                    <table class="table site-block-order-table mb-5">
                                        <thead>
                                            <th>Produto</th>
                                            <th>Total</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($products as $product): ?>
                                                <tr>
                                                    <td><?php echo $product['name'] ?><strong class="mx-2">x</strong>
                                                        <?php echo $product['quantity'] ?>
                                                    </td>
                                                    <td>R$
                                                        <?php echo calculatePercentage($product['price'], $product['featured_percentage']) ?>
                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>
                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>Subtotal do
                                                        carrinho</strong></td>
                                                <td class="text-black">R$
                                                    <?php echo calculateSubtotal($_SESSION['cart']) ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>Total do pedido</strong>
                                                </td>
                                                <td class="text-black font-weight-bold">
                                                    <div id="totalOperation">
                                                        <strong>R$
                                                            <?php echo calculateCartTotal($_SESSION['cart']) ?>
                                                        </strong>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                <?php endif; ?>

                                <div class="border p-3 mb-3">
                                    <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse"
                                            href="#collapsebank" role="button" aria-expanded="false"
                                            aria-controls="collapsebank">Pix</a></h3>

                                    <div class="collapse" id="collapsebank">
                                        <div class="py-2">
                                            <p class="mb-0">Continue a compra para ver as informações de pagamento</p>
                                        </div>
                                    </div>
                                </div>


                                <div class="border p-3 mb-3">

                                    <h3 class="h6 mb-0">
                                        <a class="d-block" data-bs-toggle="collapse" href="#collapsecheque"
                                            role="button" aria-expanded="false" aria-controls="collapsecheque">Cartão de
                                            crédito</a>
                                    </h3>

                                    <div class="collapse" id="collapsecheque">
                                        <div class="py-2">
                                            <p class="mb-0">Parcele seu pedido em até 5x sem
                                                juros.</p>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="card_number" class="text-black">Número do cartão <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="card_number"
                                                    name="card_number">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="card_name" class="text-black">Nome completo do títular <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="card_name" name="card_name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="date_expiration" class="text-black">Data de vencimento <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="date_expiration"
                                                    name="date_expiration">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="cvv" class="text-black">CVV <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="cvv" name="cvv">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="card_cpf" class="text-black">CPF/CNPJ do titular <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="card_cpf" name="card_cpf">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="card_amount" class="text-black">Quantidade de parcelas <span
                                                        class="text-danger">*</span></label>
                                                <select id="card_amount" class="form-control" name="card_amount">
                                                    <option value="1">1x de R$259,89 sem juros (R$259,89)</option>
                                                    <option value="2">2x de R$129,94 sem juros (R$259,89)</option>
                                                    <option value="3">3x de R$86,63 sem juros (R$259,89)</option>
                                                    <option value="4">4x de R$64,97 sem juros (R$259,89)</option>
                                                    <option value="5">5x de R$51,98 sem juros (R$259,89)</option>
                                                    <option value="6">6x de R$48,92 com juros (R$271,43)</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-black btn-sm" type="submit" id="button-addon2">
                                        <a class="text-cart">
                                            Finalizar compra
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function applyCoupom() {
        const coupon = document.getElementById("coupon").value;

        coupomInfo = `<div class="input-group" style="padding-top: 12px;">
                    <div class="feature row justify-content-between flex-row">
                        <p>${coupon}</p>
                    </div>
                  </div>`;

        document.getElementById("coupom-info").innerHTML = coupomInfo;

        calculateDelivery();
    }

    function calculateDelivery() {
        const BASE_URL = "<?php echo BASE_URL; ?>";

        const cep = document.getElementById("cep").value;
        const coupon = document.getElementById("coupon").value;
        let deliveryInfo = `
        <div class="text-center p-4">
            <div class="spinner-border" role="status">
            </div>
        </div>
        `;
        document.getElementById("delivery-info").innerHTML = deliveryInfo;

        setTimeout(() => {
            fetch(`${BASE_URL}checkout/delivery?cep=${cep}&coupon=${coupon}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Erro HTTP: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.deliveryCost === 0) {

                        deliveryInfo = `
                    <div class="input-group" style="padding-top: 12px;">
                    <div class="feature row justify-content-between flex-row">
                    <div class="col-2">
                    <div class="icon">
                    <img src="${BASE_URL}assets/images/truck.svg" alt="Image" class="imf-fluid">
                    </div>
                    </div>
                    <div class="col-10" style="padding-left: 24px;">
                            <strong>Receba em até 7 dias úteis</strong>
                            <p style="font-size: 12px; padding-top: 0px;">Após o pagamento confirmado</p>
                            </div>
                            </div>
                    <div class="row">
                    <p style="color: #59c00b;">Frete Grátis</p>
                    </div>
                    </div>
                    `;
                    } else {
                        deliveryInfo = `
                    <div class="input-group" style="padding-top: 12px;">
                    <div class="feature row justify-content-between flex-row">
                    <div class="col-2">
                    <div class="icon">
                    <img src="${BASE_URL}assets/images/truck.svg" alt="Image" class="imf-fluid">
                    </div>
                    </div>
                    <div class="col-10" style="padding-left: 24px;">
                            <strong>Receba em até 7 dias úteis</strong>
                            <p style="font-size: 12px; padding-top: 0px;">Após o pagamento confirmado</p>
                            </div>
                            </div>
                    <div class="row">
                    <p>R$ ${data.deliveryCost}</p>
                    </div>
                    </div>
                    `;
                    }

                    document.getElementById("delivery-info").innerHTML = deliveryInfo;

                })
                .catch(error => console.error("Erro ao calcular o frete:", error));
        }, 800);

    }
</script>