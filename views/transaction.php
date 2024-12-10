<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/transaction.css">

<div class="nana-section before-footer-section py-5">
    <div class="container">
        <?php if (empty($groupedTransactions)): ?>
            <p>Você ainda não fez uma compra na nossa loja!</p>
        <?php else: ?>
            <?php foreach ($groupedTransactions as $transactionId => $items): ?>
                <div class="card card-1 mb-5 shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                            <p class="mb-1 text-dark"><strong><?php echo $items['date'] ?></strong></p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <small class="text-muted">Número do pedido: #<?php echo $transactionId ?></small>
                        </div>

                        <?php foreach ($items['items'] as $item): ?>
                            <div class="card card-2 mb-3 border-0">
                                <div class="row g-0">
                                    <div class="col-md-2">
                                        <img src="<?php echo BASE_URL . 'assets/images/products/' . $item['product_id'] . '-1.png'; ?>"
                                            class="img-fluid"
                                            alt="Imagem do produto <?php echo htmlspecialchars($item['name']); ?>">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-md-8">
                                                    <h6 class="card-title mb-1"><?php echo htmlspecialchars($item['name']); ?></h6>

                                                    <small class="text-muted">Qtd:
                                                        <?php echo htmlspecialchars($item['total_quantity']); ?></small>
                                                </div>
                                                <div class="col-md-4 text-end">
                                                    <h6 class="mb-0">R$
                                                        <?php echo number_format($item['total_price'], 2, ',', '.'); ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="mt-4">
                            <div class="d-flex justify-content-between">
                                <p class="mb-1 text-dark"><strong>Detalhes do pedido</strong></p>
                                <p class="mb-1"><strong>Total: R$
                                        <?php echo number_format($items['total'], 2, ',', '.') ?></strong></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-1 text-muted">Desconto</p>
                                <p class="mb-1 text-muted">R$ 150</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-1 text-muted">Taxas de entrega</p>
                                <p class="mb-1 text-success">Grátis</p>
                            </div>
                        </div>

                        <div class="mt-3">
                            <p class="mb-0"><small>Data da fatura: <?php echo $items['date'] ?></small></p>
                            <p class="mb-0"><i class="fa-regular fa-credit-card"
                                    style="margin-right: 6px;"></i><strong><small>Pagamento via CARTÃO DE
                                        CRÉDITO.
                                    </small></strong></p>
                        </div>
                        <hr style="color: #b9c1c9;" />
                        <div class="mt-3">
                            <?php if (isset($_SESSION['person'])): ?>
                                <p class="mb-0"><strong><small><?php echo $_SESSION['person']['name'] ?></small></strong></p>
                            <?php endif ?>
                            <p class="mb-0"><small><?php echo $items['delivery'] ?></small></p>
                        </div>
                        <div class="mb-3">
                            <p class="mb-1 text-dark"><small><strong>Progresso da Entrega</strong></small></p>
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: <?php echo $items['progress']; ?>%;"
                                    role="progressbar" aria-valuenow="<?php echo $items['progress']; ?>" aria-valuemin="0"
                                    aria-valuemax="100">
                                    <?php echo $items['progress']; ?>%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>