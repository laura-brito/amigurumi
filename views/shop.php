<?php require './utils/util.php' ?>

<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/shop.css">

<div class="nana-section product-section before-footer-section">
	<div class="container">
		<div class="row">
			<?php if (!empty($products)): ?>
				<?php foreach ($products as $product): ?>
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<div class="card h-100">
							<?php if ($product['featured'] == 1): ?>
								<div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
									Promoção</div>
							<?php endif ?>
							<img class="card-img-top pointer"
								src="<?php echo BASE_URL . 'assets/images/products/' . $product['id'] . '-1.png'; ?>"
								href="<?= BASE_URL . 'product-details/' . htmlspecialchars($product['id']) ?>">
							<div class="card-body p-4">
								<div class="text-center">

									<h5 class="fw-bolder"><?php echo htmlspecialchars($product['name']) ?></h5>
									<?php if ($product['featured'] == 1): ?>
										<div class="fs-5 mb-5">
											<span class="text-decoration-line-through" style="font-size: 20px;">R$
												<?php echo htmlspecialchars(number_format($product['price'], 2, ',', '.')) ?></span>
											<span><?php echo 'R$' . calculatePercentage($product['price'], $product['featured_percentage']) ?></span>
										</div>
									<?php else: ?>
										<div class="fs-5 mb-5">
											<span class="text-center">
												<?php echo 'R$ ' . htmlspecialchars(number_format($product['price'], 2, ',', '.')) ?></span>
											</span>
										</div>
									<?php endif ?>

								</div>

								<div class="text-center">
									<span><?php echo '5x de R$' . calculateQuota($product['price'], 5) . '*' ?></span>
								</div>
							</div>
							<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
								<div class="text-center">
									<a class="btn btn-outline-dark mt-auto" href="product-details/details-product-1.html"><i
											class="bi bi-plus-circle-fill"></i></a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
					<div class="text-center">
						<h2>Não há produtos no momento</h2>
					</div>
				</div>
			<?php endif ?>


			<!-- 
			<div class="col-12 col-md-4 col-lg-3 mb-5">
				<div class="card h-100">
					<img class="card-img-top pointer" href="<?php echo BASE_URL; ?>product-details/details-product-"
						src="<?php echo BASE_URL; ?>assets/images/amigurumis-produtos/coelho-3.png" alt="..." />
					<div class="card-body p-4">
						<div class="text-center">
							<h5 class="fw-bolder">Amigurumi Coelhinhos Siameses</h5>
							R$189,90
						</div>
						<div class="text-center">
							<span>5x de R$37,98*</span>
						</div>
					</div>
					<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
						<div class="text-center">
							<a class="btn btn-outline-dark mt-auto" href="product-details/details-product-2.html"><i
									class="bi bi-plus-circle-fill"></i></a>
						</div>
					</div>
				</div>
			</div>

 -->

		</div>
	</div>
</div>