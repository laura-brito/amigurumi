<!-- Começo checkout/pagamento -->

<div class="nana-section">
    <div class="container">
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
        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0" id="checkout-form">
                <h2 class="h3 mb-3 text-black">Pagamento</h2>
                <div class="p-3 p-lg-5 border">
                    <div class="form-group">
                        <label for="estado" class="text-black">Estado <span class="text-danger">*</span></label>
                        <select id="estado" class="form-control">
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
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="c_fname" class="text-black">Nome <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_fname" name="c_fname">
                        </div>
                        <div class="col-md-6">
                            <label for="c_lname" class="text-black">Sobrenome <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_lname" name="c_lname">
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">Endereço <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_address" name="c_address"
                                placeholder="Rua, avenida, etc.">
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <input type="text" class="form-control"
                            placeholder="Apartamento, logradouro, unidade, etc. (opcional)">
                    </div>


                    <div class="form-group row mb-5">
                        <div class="col-md-6">
                            <label for="c_email_address" class="text-black">E-mail <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_email_address" name="c_email_address">
                        </div>
                        <div class="col-md-6">
                            <label for="c_phone" class="text-black">Telefone <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="c_phone" name="c_phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="c_create_account" class="text-black" data-bs-toggle="collapse"
                            href="#create_an_account" role="button" aria-expanded="false"
                            aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account">
                            Criar uma conta com esses dados?</label>
                        <div class="collapse" id="create_an_account">
                            <div class="py-2 mb-4">
                                <p class="mb-3">Por favor insira uma senha para criar uma conta. Caso já possua
                                    cadastro em nosso site, faça login na opção no início da página.</p>
                                <div class="form-group">
                                    <label for="c_account_password" class="text-black">Senha</label>
                                    <input type="password" class="form-control" id="c_account_password"
                                        name="c_account_password" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="c_order_notes" class="text-black">Informações adicionais/observações</label>
                        <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                            placeholder="Escreva aqui as informações adicionais..."></textarea>
                    </div>

                </div>
            </div>
            <div class="col-md-6">

                <div class="row mb-5" id="checkout-form">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Cupom</h2>
                        <div class="p-3 p-lg-5 border">

                            <label for="c_code" class="text-black mb-3">Insira aqui seu código de cupom</label>
                            <div class="input-group w-75 couponcode-wrap">
                                <input type="text" class="form-control me-2" id="c_code" placeholder="Cupom"
                                    aria-label="Coupon Code" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-black btn-sm" type="button"
                                        id="button-addon2">Aplicar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row mb-5" id="checkout-form">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Seu pedido</h2>
                        <div class="p-3 p-lg-5 border">
                            <table class="table site-block-order-table mb-5">
                                <thead>
                                    <th>Produto</th>
                                    <th>Total</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Amigurumi Gatinha<strong class="mx-2">x</strong>1</td>
                                        <td>R$99,99</td>
                                    </tr>
                                    <tr>
                                        <td>Amigurumi Pinguim <strong class="mx-2">x</strong>1</td>
                                        <td>R$189,90</td>
                                    </tr>
                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Subtotal do
                                                carrinho</strong></td>
                                        <td class="text-black">R$259,89</td>
                                    </tr>
                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Total do pedido</strong>
                                        </td>
                                        <td class="text-black font-weight-bold"><strong>R$259,89</strong></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="border p-3 mb-3">
                                <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsebank"
                                        role="button" aria-expanded="false" aria-controls="collapsebank">Pix</a></h3>

                                <div class="collapse" id="collapsebank">
                                    <div class="py-2">
                                        <p class="mb-0">Continue a compra para ver as informações de pagamento</p>
                                    </div>
                                </div>
                            </div>


                            <div class="border p-3 mb-3">
                                <h3 class="h6 mb-0">
                                    <a class="d-block" data-bs-toggle="collapse" href="#collapsecheque" role="button"
                                        aria-expanded="false" aria-controls="collapsecheque">Cartão de crédito</a>
                                </h3>

                                <div class="collapse" id="collapsecheque">
                                    <div class="py-2">
                                        <p class="mb-0">Parcele seu pedido em até 5x sem
                                            juros.</p>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="c_fname" class="text-black">Número do cartão <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_fname" name="c_fname">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="c_lname" class="text-black">Nome completo do títular <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_lname" name="c_lname">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="c_fname" class="text-black">Data de vencimento <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_fname" name="c_fname">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="c_lname" class="text-black">CVV <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_lname" name="c_lname">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="c_fname" class="text-black">CPF/CNPJ do titular <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_fname" name="c_fname">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="c_lname" class="text-black">Telefone <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_lname" name="c_lname">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="card-amount" class="text-black">Quantidade de parcelas <span
                                                    class="text-danger">*</span></label>
                                            <select id="card-amount" class="form-control">
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
                                <button class="btn btn-black btn-sm" type="button" id="button-addon2">
                                    <a href="thankyou.html" class="text-cart">
                                        Finalizar compra
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Fim checkout/pagamento -->